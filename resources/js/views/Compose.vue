<template>
    <div>
        <Header />
        <h3>Compose Page</h3>
        <router-link to="/">&laquo; Back </router-link>
        <div style="background: #fff;padding: 4px">
            <form
                method="post"
                @submit.prevent="sendMail"
                enctype="multipart/form-data"
            >
                <div class="row">
                    <div class="col-md-3">
                        <label>Subject</label>
                    </div>
                    <div class="col-md-5">
                        <input
                            type="text"
                            class="form-control"
                            v-model="subject"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Recipient(s)</label>
                    </div>
                    <div class="col-md-5">
                        <input
                            type="text"
                            class="form-control"
                            v-model="recipient"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Content</label>
                    </div>
                    <div class="col-md-5">
                        <textarea
                            cols="30"
                            rows="10"
                            class="form-control"
                            v-model="content"
                        ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Attachment</label>
                    </div>
                    <div class="col-md-5">
                        <input
                            type="file"
                            name="attachments[]"
                            @change="uploadAttachment"
                            multiple
                        />
                        <input type="text" v-model="attachmentId" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-lg btn-success">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import Header from "../components/Header";
import { mapState } from "vuex";
export default {
    components: {
        Header
    },
    data() {
        return {
            subject: null,
            recipient: null,
            content: null,
        };
    },
    computed: {
        ...mapState(["attachments"]),
        attachmentId: {
            get() {
                return JSON.stringify(this.$store.state.attachments);
            },
            // set(value) {

            // }
        }
    },
    methods: {
        sendMail() {
            const payload = {
                subject: this.subject,
                content: this.content,
                recipient: this.recipient,
                attachmentId: this.attachmentId
            };
            this.$store.dispatch("sendEmail", payload);
        },
        uploadAttachment(event) {
            const files = event.target.files;
            const formData = new FormData();
            for (const file of files) {
                formData.append("attachments", file);
            }
            this.$store.dispatch("addAttachment", { files: formData });
        }
    }
};
</script>
