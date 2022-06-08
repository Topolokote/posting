<template>
    <div class="col offset-md-1 offset-sm-1 offset-1">
        <div class="alert alert-success" role="alert">
            <i><b>Username</b>:{{comment.username}}</i>
            <span class="comment-date">{{comment.created_at}}</span>
            <br>
            {{comment.text}}
        </div>
    </div>
</template>
<script>
    export default {
        name:'ThirdCommentBox',
        props:['comment']
    }
</script>