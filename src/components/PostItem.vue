<template>
    <div class = "post">
        <div>
            <div><strong>Название: </strong> {{ post.title }}</div>
            <div><strong>Описание: </strong> {{ post.body }}</div>
        </div>
        <div class = "post_btns">
            <my-button
            style = "align-self: flex-end; 
            margin-top:40%;"
            >Удалить</my-button>
        </div>
    </div>

</template>

<script>
import MyButton from "@/components/UI/MyButton";
export default {
    components: {MyButton},
    props: {
        post: {
            type: Object,
            required: true,

        }
    }

}

</script>

<style>
.post {
    padding: 15 px;
    border: 2px solid teal;
    margin-top: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

</style>