<?php


if (!empty($_POST) && isset($_POST["btnDelete"]) && isset($_POST['postID'])) {
    Post::delete_post($_POST["postID"]);
    header('location:index.php');
}

$posts = array_map(function (Post $post) {

    $p = ['post' => $post, 'categorys' => $post->get_category(), 'information' => $post->get_information()];
    return $p;
}, Post::return_all_posts());

$categories =  Category::get_all();

?>


<div id="app">
    <div class="row mt-2">
        <div class="col-4 mr-2">
            <select name="category_search" class="form-select mb-2" aria-label="Default select example" v-model="selected" style="height: 3rem;">
                <option value="" selected>Kategorie auswählen</option>
                <option v-for="category in categories" v-bind:key="category.id" :value="category.id">{{category.name}}</option>
            </select>
        </div>
        <div class="col-4 mr-2">
            <input type="text" v-model="query" class="input-group" style="height: 3rem;">
            {{query}}
        </div>
    </div>
    <div v-for="post in posts_search" v-bind:key="post.id" class="card mt-2" style="width: 50rem; height: auto">

        <div class="card-body">
            <h5 class="card-title">{{post.post.user}}:</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{post.post.date}}</h6>
            <p class="card-text">{{post.post.text}}</p>
            <div class="card-footer">
                <div v-for="cat in post.categorys" v-bind:key="cat.id">
                    <div>{{cat["name"]}}</div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <form method="post">
                        <input type="hidden" name="postID" :value=post.post.id>
                        <button class="btn btn-danger" type="submit" name="btnDelete" :value=post.post.id>Löschen</button>
                    </form>
                </div>
                <div class="col-2">
                    <form method="post" action="edit.php">
                        <input type="hidden" name="post_id" :value="post.information[0]">
                        <input type="hidden" name="post_text" :value="post.information[1]">
                        <input type="hidden" name="post_date" :value="post.information[2]">
                        <input type="hidden" name="post_user" :value="post.information[3]">
                        <input type="hidden" name="post_categories" :value="post.information[4]">
                        <button class="btn btn-warning" type="submit" name="btnEdit">edit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


</div>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: <?= json_encode(array_reverse($posts)) ?>,
            categories: <?= json_encode($categories); ?>,
            selected: '',
            query: '',
        },
        computed: {
            posts_categories: function() {
                return this.message.filter((post) => {
                    let result = false;
                    if (this.selected === "") {
                        return true;
                    }
                    post.categorys.forEach(element => {
                        if (element.id === this.selected) {
                            result = true;
                        }

                    });
                    return result;
                });
            },

            posts_search: function() {
                return this.message.filter((post) => {
                    let result = false;
                    if (this.query === "") {
                        return true;
                    }
                    if (post.post.text.includes(this.query)) {
                        result = true;
                    };
                    return result;
                });
            }
        }
    })
</script>