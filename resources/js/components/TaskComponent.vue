<template>
<div>
    <form @submit.prevent="CreateTask">
        <div class="input-group mb-3">
            <input v-model="task_title" :class="{'is-invalid' :errors}" @keydown="ClearErr()" type="text" class="form-control" placeholder="Имя новой задачи" aria-label="Введите имя для новой задачи" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Добавить</button>
            </div>
        </div>
    </form>
    <div class="alert alert-danger" role="alert" v-if="errors">
        <div v-for="(v, k) in errors" :key="k">
            <div v-for="error in v" :key="error">
            {{ error }}
            </div>
        </div>
    </div>
    <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Список задач</div>
                </div>
                <div class="scroll-area-sm">
                    <perfect-scrollbar class="ps-show-limits">
                        <div style="position: static;" class="ps ps--active-y">
                            <div class="ps-content">
                                <ul class=" list-group list-group-flush">
                                    <li v-for="task in task_list" :key="task.id" class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"> 
                                                        <div v-if="task.confirmed == true">
                                                            <input v-on:click="CheckTask(task)" checked="checked" class="custom-control-input" :id="task.id" type="checkbox"><label class="custom-control-label" :for="task.id">&nbsp;</label> 
                                                        </div>
                                                        <div v-else>
                                                            <input v-on:click="CheckTask(task)" class="custom-control-input" :id="task.id" type="checkbox"><label class="custom-control-label" :for="task.id">&nbsp;</label> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">{{ task.title }} 
                                                        <div v-if="task.confirmed == true && task.finished_at != null" class="badge badge-success ml-2">Выполнено</div>
                                                        <div v-else-if="task.finish_date != null && task.confirmed == false && Date.now() > new Date(task.finish_date).getTime()" class="badge badge-danger ml-2">Просрочен</div>
                                                        <div v-else-if="task.confirmed == false && Date.now() < new Date(task.created_at).getTime()+(1000*60*60)" class="badge badge-info ml-2">Новая задача</div>
                                                    </div>
                                                    <div class="widget-subheading">Добавил: {{ task.user.name }} - {{ task.created_at}}</div>
                                                </div>
                                                <div class="widget-content-right btn-actions-pane-right"> 
                                                    <button class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#taskUpdateModal" v-on:click="setTaskData(task)"> 
                                                        <i class="fa fa-edit"></i>
                                                    </button> 
                                                    <button v-on:click="DeleteTask(task)" class="border-0 btn-transition btn btn-outline-danger"> 
                                                        <i class="fa fa-trash"></i> 
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </perfect-scrollbar>
                </div>
                <div class="d-block text-right card-footer"></div>
                <modal-component v-bind:task="this.task_data"></modal-component>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                task_list: '',
                task_title: '',
                errors: null,
                task_data: '',
            }
        },

        methods:{
            CreateTask(){
                let data = new FormData();
                data.append('title', this.task_title)
                data.append('user_id', '1')
                axios.post('/api/task', data)
                    .then((response) => {
                        this.task_title = null
                        this.GetTask()
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    })
            },

            GetTask(){
                axios.get('/api/task')
                    .then((responce) => {
                        this.task_list = responce.data
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    })
                    
            },
            
            DeleteTask(element){
                let data = new FormData();
                data.append('_method', 'DELETE')
                axios.post('/api/task/'+element.id, data)
                    .then((response) => {
                        this.GetTask()
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    })
            },

            CheckTask(element){
                element.confirmed = !element.confirmed
                let data = new FormData();
                data.append('_method', 'PATCH')
                if(element.confirmed == true){
                    data.append('confirmed', 1)
                }
                if(element.confirmed == false){
                    data.append('confirmed', 0)
                }
                axios.post('/api/task/'+element.id, data)
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    })
                
            },

            ClearErr(){
                this.errors = null
            },

            setTaskData(task){
                this.task_data = task
            }
        },

        mounted() {
            this.GetTask()
        }
    }
</script>
