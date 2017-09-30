<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Example Component</div>
          <div class="panel-body">
            I'm an example component!
            {{ user.name }}
            {{ user2.name }}
            <button @click="save">Save User</button>
            <button @click="Delete">Delete User</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import User from '../store/User'
  import Watcher from '../store/Watcher'

  export default {

    data () {
      return {
        user: new User({ id: 1, name: 'Diego' }),
        user2: new User({ id: 1, name: 'Liz' }),
      }
    },

    methods : {

      save () {
        this.user2.save()
      },

      Delete () {
        this.user = null
        console.log(Watcher)
      }
    },

    mounted() {
      console.log('Component mounted.')
    }
  }       
</script>
