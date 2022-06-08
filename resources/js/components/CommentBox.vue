<template>
    <div>
        <div class="alert alert-primary" role="alert">
            <i><b>Username</b>:{{comment.username}}</i>
            <span class="comment-date">{{comment.created_at}}</span>
            <br>
            {{comment.text}}
            <br>
            <span class="reply-link" @click="showNested = showNested ? false : true">
                {{showNested ? 'Hide reply form' : 'Reply'}}
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <span class="reply-link" @click="showAnswersMethod()">
                {{showAnswers ? 'Hide answers' : 'Answers'}}
            </span> 
        </div>
        <post-action v-if="showNested" :commentId="comment.id" @postComment="postComment"></post-action>
        <div class="row">
            <div class="col offset-md-1 offset-sm-1 offset-1">
                <div v-if="showAnswers" v-for="nestedComment in comments" :key="nestedComment.id">
                    <second-comment-box :comment="nestedComment">
                    </second-comment-box>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import PostAction from './PostAction';
    import SecondCommentBox from './SecondCommentBox';
    import {CommentService} from '../services/comment-service';
    export default {
        name:'CommentBox',
        props:['comment'],
        components:{
            PostAction,
            SecondCommentBox
        },
        data(){
            return {
                showNested:false,
                showAnswers:false,
                comments:[],
            }
        },
        methods:{
            postComment(comment){
                this.comments.unshift(comment);

                if(!this.showAnswers)
                    this.showAnswersMethod();
            },
            showAnswersMethod(){
                this.showAnswers=this.showAnswers ? false : true;
                if(this.showAnswers){
                    CommentService.getComments({commentId:this.comment.id}).then(response => {
                        this.comments=response.data;
                    });
                }
            }
        }
    }
</script>