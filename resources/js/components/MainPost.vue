<template>
    <div class="container">
        <br>
        <h1>Aloware Post Blog</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-md-5">
                <post-action @postComment="postComment"></post-action>
            </div>
            <div class="col-md-7">
                <comment :comments="comments"></comment>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import {CommentService} from '../services/comment-service';
    import PostAction from './PostAction';
    import Comment from './Comment';

    export default {
        name:'MainPost',
        components:{
            PostAction,
            Comment
        },
        data(){
            return {
                comments:[]
            }
        },
        methods:{
            postComment(comment){
                this.comments.unshift(comment);
            },
        },
        mounted(){
            CommentService.getComments({commentId:null}).then(response => {
                this.comments=response.data;
            });
        }
    }
</script>