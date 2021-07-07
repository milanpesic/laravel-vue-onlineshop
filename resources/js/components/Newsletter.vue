<template>
    <div v-if="success === null">
        <div class="input-group">
        <!-- <a class="btn btn-light border shadow-sm" :href="newsletterHomeRoute"><img :src="newsletterBrandImage" width="120" alt=""></a> -->

            <input type="email" v-model="email"  class="form-control border border-3 border-dark shadow-none" placeholder="Newsletter">
            
            <button v-if="loading === false" class="btn btn-dark fw-bold col-3 shadow-none" @click="sendEmail" type="button">Send</button>

            <button v-else class="btn btn-dark fw-bold shadow-none" :disabled="loading" type="button">
                <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...
            </button>
        </div>
        <small v-if="error" class="badge bg-warning text-dark fw-bold" v-text="error"></small>
    </div>
    <span v-if="success" class="text-success fs-6 fw-bold" v-text="success"></span>
</template>

<script>
    export default {
        props: {
            newsletterRoute: {
                type: String
            },
            newsletterHomeRoute: {
                type: String
            },
            newsletterBrandImage: {
                type: String
            }
        },
        data() {
            return {
                loading: false,
                email: null,
                error: null,
                success: null
            }
        },
        methods: {
            sendEmail() {
                this.loading = true,
                axios.post(this.newsletterRoute, { email: this.email })
                .then(response => (response.data, this.success = response.data.success, this.email = ''))
                .catch(error => {
                    this.error = error.response.data.errors.email[0] ? error.response.data.errors.email[0] : ''
                })
                .finally(() => {
                    this.loading = false
                });
            }
        },
        watch: {
            email() {
                if(!this.email) {
                    return this.error = ''
            }
        },
    },
    }

</script>