<template>
    <div>
        <Header />
        <h3>Compose Page</h3>
        <router-link to="/">&laquo; Back </router-link>
        <div style="background: #fff;padding: 4px">
            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label>Sender</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                    <div class="row">
                    <div class="col-md-3">
                        <label>Content</label>
                    </div>
                    <div class="col-md-5">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-md-3">
                        <label>Attachment</label>
                    </div>
                    <div class="col-md-5">
                        <input type="file">
                    </div>
                </div>
                    <div class="row">
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-lg btn-success">Send </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import Header from "../components/Header";
export default {
    components: {
        Header
    }
};
</script>
