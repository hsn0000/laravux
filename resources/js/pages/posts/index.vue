<template>
  <div class="posts">
    <div class="wrapper">
     <div class="menu">
      <ul> 
        <li><router-link to="/posts">All Posts</router-link></li> 
        <li><router-link to="/posts/create">+ New Post</router-link></li> 
      </ul>
    </div>
    <div class="posts">
        <router-view :posts="posts"></router-view>
    </div>
    </div>
  </div>
</template> 

<style scoped>
.wrapper{ 
  background: #eee;
  border-radius: 2px;
  padding: 22px;
}
.menu{
  display: inline-block;
  width: 100%;
}
.menu ul{
  float: right;
  margin-top: 0;
}
.menu ul li{
  background: #b78686;
}
</style>

<script>
export default {
    computed: {
        posts() {
            return this.$store.state.posts
        },
    },
    created() {
        this.getPost()
    },
    methods: {
        getPost() {
            this.$store.dispatch('getPost')
        }
    },

}
</script>