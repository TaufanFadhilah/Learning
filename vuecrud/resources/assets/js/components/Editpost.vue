<template id="edit-post">
<div class="">
  <h3>Edit {{post.title}}</h3>
  <form v-on:submit.prevent = "updatePost">
    <div class="form-group">
      <label for="edit-title">Title</label>
      <input type="text" v-model="post.title" class="form-control" id="edit-title" required>
    </div>
    <div class="form-group">
      <label for="edit-body">Body</label>
      <textarea class="form-control" rows="10" v-model="post.body"></textarea>
    </div>
    <button type="submit" class="btn btn-xs btn-primary">Edit Post</button>
    <router-link class="btn btn-xs btn-warning" :to="{ name: 'Listposts' }">Cancel</router-link>
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
  methods: {
    updatePost: function(){
      let uri = 'http://localhost:8000/posts/'+this.$route.params.id;
      Axios.put(uri,this.post).then((response) => {
        this.$router.push({name: 'Listposts'});
      });
    }
  }
}
</script>

<style lang="css">
</style>
