<template>
  <div>
    <div
      class="modal fade"
      id="taskUpdateModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="taskUpdateModal"
      aria-hidden="true"
      ref="vuemodal"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex justify-content-center">
            <div class="row">
              <div class="widget-content-left ml-2">
                <div class="widget-heading h5">
                  {{ task.title }}
                  <div
                    v-if="task.confirmed == true && task.finished_at != null"
                    class="badge badge-success ml-2"
                  >
                    Выполнено
                  </div>
                  <div
                    v-else-if="
                      task.finish_date != null &&
                      task.confirmed == false &&
                      Date.now() > new Date(task.finish_date).getTime()
                    "
                    class="badge badge-danger ml-2"
                  >
                    Просрочен
                  </div>
                  <div
                    v-else-if="
                      task.confirmed == false &&
                      Date.now() <
                        new Date(task.created_at).getTime() + 1000 * 60 * 60
                    "
                    class="badge badge-info ml-2"
                  >
                    Новая задача
                  </div>
                </div>
                <div class="widget-subheading">
                  Добавил: - {{ task.created_at }}
                </div>
              </div>
            </div>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="list-group list-group-flush">
              <div class="list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <label class="mb-1 align-self-end" for="date-input"
                    >Дата исполнения</label
                  >
                  <input
                    class="form-control form-control-sm w-50"
                    type="date"
                    :value="task.finish_date"
                    id="date-input"
                    @input="
                      task.finish_date = $event.target.value;
                      UpdateFinishDate(task);
                    "
                  />
                </div>
              </div>

              <div class="list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <label class="mb-1 align-self-start">Исполнители</label>
                  <div class="w-50">
                    <div class="flex-row align-items-start">
                      <div class="input-group input-group-sm mb-3">
                        <input
                          type="text"
                          v-model="task_member"
                          class="form-control"
                          placeholder="Введите имя пользователя"
                          aria-label="Recipient's username"
                          aria-describedby="basic-addon2"
                          @keydown="ClearErr()"
                        />
                        <div class="input-group-append">
                          <button
                            v-on:click="AddMember(task.id)"
                            class="btn btn-outline-success"
                            type="button"
                          >
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="alert alert-danger" role="alert" v-if="errors.user_name">
                              {{ errors['user_name'][0] }}
                      </div>
                      <div v-for="member in member_list" :key="member.id">
                        <div
                          class="flex-row d-flex justify-content-between py-1"
                        >
                          <label class="mb-1 align-self-center">{{
                            member.user.name
                          }}</label>
                          <button
                            v-on:click="DeleteMember(member)"
                            class="btn btn-sm btn-outline-danger btn-transition border-0"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <label class="mb-1">Список дополнительных заданий</label>
                </div>
                <div class="flex-row w-100 align-items-start">
            
                  <div v-for="sub_task in sub_task_list" :key="sub_task.id">
                    <div v-if="edit.element == null || edit.element != sub_task.id" >
                      <div class="d-flex flex-row justify-content-between py-1">
                          <div class="custom-checkbox custom-control">
                            <div v-if="sub_task.confirmed == true">
                              <input v-on:click="CheckSubTask(sub_task)" checked="checked" class="custom-control-input" :id="'sub'+sub_task.id" type="checkbox"><label class="custom-control-label" :for="'sub'+sub_task.id">&nbsp;</label> 
                            </div>
                            <div v-else>
                              <input v-on:click="CheckSubTask(sub_task)" class="custom-control-input" :id="'sub'+sub_task.id" type="checkbox"><label class="custom-control-label" :for="'sub'+sub_task.id">&nbsp;</label> 
                            </div>
                          </div>
                          <label class="w-50">{{sub_task.title}}</label>
                          <p>{{sub_task.start_time}}</p>
                          <p>{{sub_task.end_time}}</p>
                          <button class="btn btn-sm btn-outline-success btn-transition border-0 align-self-start" v-on:click="edit.element = sub_task.id; edit.title = sub_task.title; edit.start_time = sub_task.start_time; edit.end_time = sub_task.end_time;"> 
                            <i class="fa fa-edit"></i>
                          </button> 
                          <button
                            v-on:click="DeleteSubTask(sub_task)"
                            class="btn btn-sm btn-outline-danger btn-transition border-0 align-self-start"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>
                      <div v-else-if="edit.element == sub_task.id">
                        <div class="d-flex flex-row justify-content-between py-1">
                          <input v-model="edit.title" class="form-control form-control-sm w-50" type="text">
                          <input v-model="edit.start_time" class="form-control form-control-sm w-25" type="text">
                          <input v-model="edit.end_time" class="form-control form-control-sm w-25" type="text">
                          <button class="btn btn-sm btn-warning align-self-center" v-on:click="UpdateSubTask(sub_task)"> 
                            <i class="fa fa-edit"></i>
                          </button> 
                          <button
                            v-on:click="DeleteSubTask(sub_task)"
                            class="btn btn-sm btn-outline-danger btn-transition border-0 align-self-center"
                          >
                            <i class="fa fa-trash"></i>
                          </button>

                        </div>
                      </div>

                    </div>
                  </div>

                  <div
                    class="d-flex flex-row justify-content-between py-1"
                  >
                    <input v-model="new_sub.title" class="form-control form-control-sm w-50 mb-1" placeholder="Имя задания" @keydown="ClearErr()">
                    <input v-model="new_sub.start_time" class="form-control form-control-sm w-25 mb-1" placeholder="Начало" @keydown="ClearErr()">
                    <input v-model="new_sub.end_time" class="form-control form-control-sm w-25 mb-1" placeholder="Конец" @keydown="ClearErr()">
                    <button
                      v-on:click="CreateSubTask(task.id)"
                      class="btn btn-sm btn-outline-success btn-transition border-0 align-self-start"
                    >
                      <i class="fa fa-check"></i>
                    </button>
                  </div>
                  <div class="alert alert-danger" role="alert" v-if="errors.end_time || errors.start_time || errors.title">
                      <div v-for="(v, k) in errors" :key="k">
                        <div v-for="error in v" :key="error">
                          {{ error }}
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
</template>
<script>
export default {
  props: ["task"],
  data() {
    return {
      task_member: "",
      member_list: "",
      sub_task_list: "",
      new_sub: {
        title: null,
        start_time: null,
        end_time: null,
      },
      edit: {
        element: null,
        title: null,
        start_time: null,
        end_time: null,
      },
      errors: "",
    };
  },

  watch:{
    task: function (){
      this.GetSubTask(this.task.id)
      this.GetMembers(this.task.id)
    }
  },

  methods: {
    AddMember(element) {
      let data = new FormData();
      data.append("task_id", element);
      data.append("user_name", this.task_member);
      axios
        .post("/api/task-member", data)
        .then((response) => {
          this.task_member = null
          this.GetMembers(this.task.id);
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    GetMembers(element) {
      axios
        .get("/api/task-member-get/"+element)
        .then((responce) => {
          this.member_list = responce.data;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    DeleteMember(element) {
      let data = new FormData();
      data.append("_method", "DELETE");
      axios
        .post("/api/task-member/" + element.id, data)
        .then((response) => {
          this.GetMembers(this.task.id);
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    CreateSubTask(element) {
      let data = new FormData();
      data.append('task_id', element)
      data.append("title", this.new_sub.title);
      data.append("start_time", this.new_sub.start_time);
      data.append("end_time", this.new_sub.end_time);
      data.append("confirmed", 0);
      axios
        .post("/api/sub-task", data)
        .then((response) => {
          this.ClearNewSub();
          this.GetSubTask(this.task.id);
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    GetSubTask(element) {
      axios
        .get("/api/sub-task-get/"+element)
        .then((responce) => {
          this.sub_task_list = responce.data;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    DeleteSubTask(element) {
      let data = new FormData();
      data.append("_method", "DELETE");
      axios
        .post("/api/sub-task/" + element.id, data)
        .then((response) => {
          this.GetSubTask(this.task.id);
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    CheckSubTask(element) {
      element.confirmed = !element.confirmed;
      let data = new FormData();
      data.append("_method", "PATCH");
      if (element.confirmed == true) {
        data.append("confirmed", 1);
      }
      if (element.confirmed == false) {
        data.append("confirmed", 0);
      }
      axios
        .post("/api/sub-task/" + element.id, data)
        .catch((error) => {
          this.errors = error.response.data.errors;
        })
        .then((response) => {
          this.GetSubTask(this.task.id);
        });
    },

    UpdateSubTask(sub_task) {
      let data = new FormData();
      data.append("_method", "PATCH");
      data.append("title", this.edit.title);
      data.append("start_time", this.edit.start_time);
      data.append("end_time", this.edit.end_time);
      axios
        .post("/api/sub-task/" + sub_task.id, data)
        .catch((error) => {
          this.errors = error.response.data.errors;
        })
        .then((response) => {
          this.GetSubTask(this.task.id);
          this.ClearEdit();
        });
    },

    UpdateFinishDate(element) {
      let data = new FormData();
      data.append("_method", "PATCH");
      data.append("finish_date", element.finish_date);
      axios
        .post("/api/task/" + element.id, data)
        .catch((error) => {
          this.errors = error.response.data.errors;
        })
        .then((response) => {
          console.log("ok");
        });
    },

    ClearErr() {
      this.errors = "";
    },

    ClearEdit(){
      for (var el in this.edit) {
        Vue.set(this.edit, el, null)
      }
    },

    ClearNewSub(){
      for(var el in this.new_sub){
        Vue.set(this.new_sub, el, null)
      }
    }

  },

  mounted() {
    this.GetSubTask(this.task.id);
    this.GetMembers(this.task.id);
  },
};
</script>
