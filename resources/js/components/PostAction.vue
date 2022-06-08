<template>
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" v-model="username">
                    <span v-if="loading">Posting...</span>
                </div>
            </div>
            <div class="col-md-7">
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" rows="3" placeholder="Type your comment" v-model="text">
                    </textarea>
                </div>
                <button type="button" class="btn btn-primary" @click="postComment()" v-if="!loading">Post comment</button>
                <br><br>
            </div>
        </div>
</template>
<script type="text/babel">
    import {CommentService} from '../services/comment-service';

    export default {
        name:'PostAction',
        props:['commentId'],
        data(){
            return {
                username:null,
                text:null,
                loading:false
            }
        },
        mounted(){
            
        },
        methods:{
            postComment(){
                if(this.username!=null && this.text!=null){
                    this.loading=true;
                    CommentService.postComment({username:this.username,text:this.text,commentId:this.commentId?this.commentId:null}).then(response=>{
                        this.$emit('postComment',response.data);
                        this.clearData();
                    });
                }else{
                    alert('Username and comment are required fields');
                }
            },
            clearData(){
                this.loading=false;
                this.text=null;
                this.username=null;
            }
        }
    }
</script>