<template lang="html">
<div class="">
  <h3>Delete post {{ post.title }}</h3>
  <form v-on:submit.prevent = "deletePost">
    <p>The action cannot be undone</p>
    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
    <router-link class="btn btn-xs btn-primary" :to="{ name: 'Listposts', params: {} }">Back to list</router-link>
  </form>
</div>
</template>

<script>
export default {
  data: function(){
    return {post: {title: '', body: ''}}
  },
  created: function(){
    let uri = 'http://localhost:8000/posts/'+this.$route.params.id+'/edit';
    Axios.get(uri).then((response) =>{
      this.post = response.data;
    });
  },
  methods:{
    deletePost: function(){
      let uri = 'http://localhost:8000/posts/'+this.$route.params.id;
      Axios.delete(uri).then((response) =>{
        this.$router.push({name: 'Listposts'});
      });
    }
  }
}
</script>

<style lang="css">
</style>
