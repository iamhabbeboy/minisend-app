<template>
    <div class="container layout">
        <div class="row">
            <div class="col-md-5">
                <div class="padded">
                    <h3>MINI<span class="color-orange">send</span></h3>
                    <br/>
                    <form method="post" @submit.prevent="processLogin">
                    <label>Email Address</label>
                    <input type="text" class="form-control">
                    <label>Company Name</label>
                    <input type="text" class="form-control">
                    <p></p>
                    <label>Password</label>
                    <input type="password" class="form-control">
                    <p></p>
                    <button class="btn btn-lg btn-success" style="width: 100%">Get Started </button>
                    </form>
                </div>
            </div>
            <div class="col-md-7 image-holder"></div>
        </div>
    </div>
</template>
<style scoped>
    .layout {
        margin-top: 60px;
        background: #FFF;
        box-shadow: 3px 4px 4px 0px #ccc;
    }
    .padded {
        padding: 50px;
    }

    .color-orange {
        color: orange;
        text-transform: uppercase;
    }

    .image-holder {
        background: url(/assets/4.jpg);
        background-position: center right;
        background-size: cover;
        padding-top: 50px;
        padding-bottom: 50px;
        height: 500px;
    }
</style>
<script>
export default {
    methods: {
        processLogin() {
           alert("Hello world ")
        }
    }
}
</script>
