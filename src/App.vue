<template>
    <div class = "app">
        <post-form 
        @create = "createPost"
        />
        <post-list 
        :posts = "posts"
        />
    </div>

</template>

<script>
import PostForm from "@/components/PostForm";
import PostList from "@/components/PostList";

export default {
    components: {
        PostForm, PostList
    },
    data() {
        return {
            posts: [
                {id: 1, title: 'onon1', body: 'descr 1'},
                {id: 2, title: 'onon2', body: 'descr 2'},
                {id: 3, title: 'onon3', body: 'descr 3'},
                {id: 3, title: 'onon3', body: 'descr 3'}
            ]
        }
    },
    methods: {
        createPost(post)
        {
            this.posts.push(post);
        },
        

    }
}
</script>

<style>

enabled-style
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;

}

.app {
    padding: 20px;
}

</style>