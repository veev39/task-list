<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task list</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Style -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/3.0.3/css/bootstrap-combined.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style></style>


</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-sm">Task id</div>
            <div class="col-sm">Title</div>
            <div class="col-sm">Date</div>
        </div>
        <div v-for="task in tasks">
            <div class="row " v-on:click="showTask(task.id)">
                <div class="col-sm">@{{task.id}}</div>
                <div class="col-sm">@{{task.title}}</div>
                <div class="col-sm">@{{task.date}}</div>
            </div>
        </div>
    </div>
    <div class="container">
        <button type="button" class="btn btn-light" v-on:click="getPage(pagination.links.previous)">previous</button>
        <button type="button" class="btn btn-light" v-on:click="getPage(pagination.links.next)">next</button>
    </div>
    <div class="container" v-if="show">
        <div >Task id: @{{task.id}}</div>
        <div>Title: @{{task.title}}</div>
        <div>Date: @{{task.date}}</div>
        <div>Author: @{{task.author}}</div>
        <div>Status: @{{task.status}}</div>
        <div>Description: @{{task.description}}</div>
        <button type="button" class="btn btn-light" v-on:click="hideTask()">hide</button>
    </div>

</div>
</body>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  new Vue({
    el: '#app',
    data: {
      tasks: [],
      task: [],
      pagination: [],
      show: false,
    },
    created: function () {
      this.getTasks()

    },
    methods: {
      getTasks () {
        axios.get('/api/v1/tasks?perPage=10')
          .then((response) => {
            this.tasks = response.data.data
            this.pagination = response.data.meta.pagination
          })
      },
      getPage (url) {
        axios.get(url + '&perPage=10')
          .then((response) => {
            this.tasks = response.data.data
            this.pagination = response.data.meta.pagination
          })
      },
      showTask (id) {
        axios.get('/api/v1/tasks/' + id)
          .then((response) => {
            this.task = response.data.data
            this.show = true
          })
      },
      hideTask(){
        this.show = false
      },
    },
  })
</script>
</html>
