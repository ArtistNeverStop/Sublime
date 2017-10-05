<template>
  <div class="app" id="app">
    <navbar></navbar>
    <router-view></router-view>
  </div>
</template>

<script>
  export default {

    data () {
      return {
      }
    },

    methods: {
    },

    mounted () {
      console.log('Component mounted.')
    }
  }
</script>