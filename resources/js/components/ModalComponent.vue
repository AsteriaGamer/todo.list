<template>
<div>
<div class="modal fade" id="taskUpdateModal" tabindex="-1" role="dialog" aria-labelledby="taskUpdateModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ task.title }}</h5>
        <div class="widget-subheading">Добавил: {{ task.user.name }} - {{ task.created_at}}</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            {{ task.title }}
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
