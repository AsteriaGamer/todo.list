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
        <div class="list-group list-group-flush">

          <div class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <label class="mb-1 align-self-end" for="date-input">Дата исполнения</label>
              <input class="form-control form-control-sm w-50" type="text" placeholder="2020-10-30" id="date-input">
            </div>
          </div>

          <div class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <label class="mb-1 align-self-start">Исполнители</label>
              <div class="w-50">
                <div class="flex-row align-items-start">
                  <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Введите имя пользователя" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success" type="button"><i class="fa fa-plus"></i> </button>
                    </div>
                  </div>
                  <div class="flex-row d-flex justify-content-between py-1">
                    <label class="mb-1 align-self-center">Иванов И.И.</label>
                    <button class="btn btn-sm btn-outline-danger btn-transition border-0"> 
                      <i class="fa fa-trash"></i> 
                    </button> 
                  </div>

                  <a href="#collapseExample" data-toggle="collapse">Подробнее</a>

                  <div class="collapse" id="collapseExample">
                       <div class="flex-row d-flex justify-content-between py-1">
                    <label class="mb-1 align-self-center">Петров Д.А.</label>
                    <button class="btn btn-sm btn-outline-danger btn-transition border-0"> 
                      <i class="fa fa-trash"></i> 
                    </button> 
                  </div>
                  <div class="flex-row d-flex justify-content-between py-1">
                    <label class="mb-1 align-self-center">Смирнов А.Г.</label>
                    <button class="btn btn-sm btn-outline-danger btn-transition border-0"> 
                      <i class="fa fa-trash"></i> 
                    </button>
                  </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div  class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <label class="mb-1">Список дополнительных заданий</label>
              <small class="text-muted">выполнено 0/3</small>
            </div>
            <div class="flex-row align-items-start">
                <div class="d-flex flex-row justify-content-between py-1">
                  <div class="custom-checkbox custom-control">
                    <input class="custom-control-input" type="checkbox" id="test1"><label class="custom-control-label" for="test1">&nbsp;</label>
                  </div>
                  <label class="w-50">Проснуться и заправить кровать</label>
                  <p>06:00</p>
                  <p>06:05</p>
                  <button class="btn btn-sm btn-outline-danger btn-transition border-0 align-self-start"> 
                    <i class="fa fa-trash"></i> 
                  </button>
                </div>  
                <div class="d-flex flex-row justify-content-between py-1">
                  <div class="custom-checkbox custom-control">
                    <input class="custom-control-input" type="checkbox" id="test2"><label class="custom-control-label" for="test2">&nbsp;</label>
                  </div>
                  <label class="w-50">Умыться и почистить зубы</label>
                  <p>06:05</p>
                  <p>06:10</p>
                  <button class="btn btn-sm btn-outline-danger btn-transition border-0 align-self-start"> 
                    <i class="fa fa-trash"></i> 
                  </button> 
                </div> 
                <div class="d-flex flex-row justify-content-between py-1">
                  <div class="custom-checkbox custom-control">
                    <input class="custom-control-input" type="checkbox" id="test2"><label class="custom-control-label" for="test2">&nbsp;</label>
                  </div>
                  <label class="w-50">Утреняя зарядка</label>
                  <p>06:10</p>
                  <p>06:25</p>
                  <button class="btn btn-sm btn-outline-danger btn-transition border-0 align-self-start"> 
                    <i class="fa fa-trash"></i> 
                  </button> 
                </div> 
                <div class="d-flex flex-row justify-content-between py-1">
                  <div class="custom-checkbox custom-control">
                    <input class="custom-control-input" type="checkbox" id="test4"><label class="custom-control-label" for="test4">&nbsp;</label>
                  </div>
                  <label class="w-50">Добраться до работы</label>
                  <p>06:25</p>
                  <p>07:45</p>
                  <button class="btn btn-sm btn-outline-danger btn-transition border-0 align-self-start"> 
                    <i class="fa fa-trash"></i> 
                  </button>
                </div> 
                <div class="d-flex flex-row justify-content-center py-1">
                  <button class="btn btn-sm btn-outline-success"> 
                    Добавить
                  </button>
                </div> 
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">

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
