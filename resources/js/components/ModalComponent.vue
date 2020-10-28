<template>
<div>
<div class="modal fade" id="taskUpdateModal" tabindex="-1" role="dialog" aria-labelledby="taskUpdateModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
      <div class="row">
        <div class="widget-content-left ml-2">
          <div class="widget-heading h5">{{ task.title }} 
            <div v-if="task.confirmed == true && task.finished_at != null" class="badge badge-success ml-2">Выполнено</div>
            <div v-else-if="task.finish_date != null && task.confirmed == false && Date.now() > new Date(task.finish_date).getTime()" class="badge badge-danger ml-2">Просрочен</div>
            <div v-else-if="task.confirmed == false && Date.now() < new Date(task.created_at).getTime()+(1000*60*60)" class="badge badge-info ml-2">Новая задача</div>
          </div>
         <div class="widget-subheading">Добавил: {{ task.user.name }} - {{ task.created_at}}</div>
        </div>
      </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-start py-2">
          <div class="col-4">
            Дата исполнения:
          </div>
          <div class="col-8">
            <div v-if="task.finish_date != null">
              {{ task.finish_date }}
            </div>
            <div v-else>
              <input type="text" class="form-control" placeholder=".col-xs-3">
            </div>
          </div>
        </div>
        <div class="row justify-content-start py-2">
          <div class="col-4">
            Исполнители:
          </div>
          <div class="col-8">
            <div class="row justify-content-between">
              <div class="col-6">
                Петров Д.А.
              </div>
              <div class="col-2">
                <button class="border-0  btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button> 
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-6">
                Смирнов Г.М.
              </div>
              <div class="col-2">
                <button class="border-0  btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button> 
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-6">
                Иванов И.И.
              </div>
              <div class="col-2">
                <button class="border-0  btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button> 
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-10">
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="col-2">
                <button class="border-0 btn-sm btn-outline-success"><i class="fa fa-plus mu-2"></i></button> 
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-start py-2">
          <div class="col-4">
            Список задач:
          </div>
          <div class="col-8">
            
            <div class="row">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder=".col-xs-3">
                    </div>
                </div>
            
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
</template>
<script>
  export default {
      props: ['task'],
      data(){
          return{
              
          }
      }
  }
</script>
