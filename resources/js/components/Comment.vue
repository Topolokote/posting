<template>
    <br>
    <div class="card">
        <div class="card-body">
            <div v-for="comment in comments" :key="comment.id">
                <comment-box :comment="comment">
                </comment-box>
            </div>
            <h3 v-if="comments.length==0">No comments</h3>
        </div>
    </div>
</template>
<script type="text/babel">
    import CommentBox from './CommentBox';

    export default {
        name:'Comment',
        components:{
            CommentBox
        },
        props:['comments']
    }
</script>