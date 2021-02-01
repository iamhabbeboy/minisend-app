<template>
    <div>
        <Header />
        <h3>Compose Page</h3>
        <router-link to="/">&laquo; Back </router-link>
        <div class="compose-form">
            <form
                method="post"
                @submit.prevent="sendMail"
                enctype="multipart/form-data"
            >
            <div class="alert alert-success" v-show="isSent">Mail sent successfully</div>
                <div class="row spacing">
                    <div class="col-md-3">
                        <label>Sender</label>
                    </div>
                    <div class="col-md-5">
                        <input
                            type="email"
                            class="form-control"
                            v-model="sender"
                            :required="!error"
                        />
                    </div>
                </div>
                <div class="row spacing">
                    <div class="col-md-3">
                        <label>Subject</label>
                    </div>
                    <div class="col-md-5">
                        <input
                            type="text"
                            class="form-control"
                            v-model="subject"
                             :required="!error"
                        />
                    </div>
                </div>
                <div class="row spacing">
                    <div class="col-md-3">
                        <label
                            >Recipient&nbsp;
                            <small
                                ><i>(seperate email with comma)</i></small
                            ></label
                        >
                    </div>
                    <div class="col-md-5">
                        <input
                            type="text"
                            class="form-control"
                            v-model="recipient"
                             :required="!error"
                        />
                    </div>
                </div>
                <div class="row spacing">
                    <div class="col-md-3">
                        <label>Content</label>
                    </div>
                    <div class="col-md-5">
                        <textarea
                            cols="30"
                            rows="10"
                            class="form-control"
                            v-model="content"
                             :required="!error"
                        ></textarea>
                    </div>
                </div>
                <div class="row spacing">
                    <div class="col-md-3">
                        <label>Attachment <small><i>(file supported: image, pdf, doc)</i></small></label>
                    </div>
                    <div class="col-md-5">
                        <input
                            type="file"
                            name="attachments[]"
                            @change="uploadAttachment"
                            multiple
                            accept="image/*, .pdf, .doc"
                        />
                        <input type="hidden" v-model="attachmentId" />
                        <span v-show="hasUploaded">
                            <i class="fa fa-cog fa-spin"></i>
                            <small> Loading...</small>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-lg btn-success" :disabled="isLoading">Send
                            <i class="fa fa-cog fa-spin" v-show="isLoading"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<style scoped>
.spacing {
    margin-bottom: 10px;
}

.compose-form {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
}
</style>
<script>
import Header from "../components/Header";
import { mapState } from "vuex";
export default {
    components: {
        Header
    },
    data() {
        return {
            sender: null,
            subject: null,
            recipient: null,
            content: null,
            error: null,
            isLoading: false,
            isSent: false,
            hasUploaded: false,
            hasFileSize: false
        };
    },
    computed: {
        ...mapState(["attachments"]),
        attachmentId: {
            get() {
                return JSON.stringify(this.$store.state.attachments);
            },
            set(value) {
                return '';
            }
        }
    },
    methods: {
        sendMail() {
            const payload = {
                sender: this.sender,
                subject: this.subject,
                content: this.content,
                recipient: this.recipient,
                attachmentId: this.attachmentId
            };
             if (!this.validation(payload)) {
                this.isLoading = true;
                this.$store.dispatch("sendEmail", payload)
                .then(() => {
                    this.isLoading = false
                    this.isSent = true
                    this.sender = '';
                    this.subject = '';
                    this.content = '';
                    this.recipient = '';
                    this.attachmentId = '';
                })

             }
        },
        validation(payload) {
            if (
                payload.sender == null ||
                payload.subject ||
                payload.recipient ||
                payload.content
            ) {
                this.error = true;
            }
            this.error = false;
            return false;
        },
        uploadAttachment(event) {
            const files = event.target.files;
            const formData = new FormData();
            const MAX_FILE_SIZE = 1024;
            const CONVERT_TO_KILOBYTE = 1024;
            const totalFiles = Array.from(files);
            for(let file = 0; file < totalFiles.length; file++) {
                const filesize = Math.ceil(
                    totalFiles[file].size / CONVERT_TO_KILOBYTE
                ) ;
                if(filesize > MAX_FILE_SIZE) {
                    alert(`Max filesize is 1MB`);
                    this.hasFileSize = false;
                } else {
                    formData.append(`attachments[${file}]`, totalFiles[file]);
                    this.hasFileSize = true;
                }
            }
            if(this.hasFileSize) {
                this.hasUploaded = true;
                this.$store.dispatch("addAttachment", { files: formData })
                .then(() => this.hasUploaded = false)
            }
        }
    }
};
</script>
