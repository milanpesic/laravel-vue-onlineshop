<template>
    <div class="text-center">
        <div v-if="verify" class="alert alert-success fw-bold p-1 mt-3 rounded col-md-12 small">{{ verify }}</div>
        <div v-else-if="unverify" class="alert alert-danger mb-3 fw-bold small" v-html="unverify"></div>
        <div v-else class="alert alert-info">
            <p class="fw-bold p-1 rounded col-md-12 small">Your email adress is not verified yet!</p>
            <button class="btn btn-sm btn-dark fw-bold shadow-none" @click="sendConfirmationLink" type="button">
                <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> {{ resend }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        url: {
            type: String
        },
        email: {
            type: [String, Array, Object]
        }
    },
    data() {
        return {
            verify: null,
            unverify: null,
            loading: false
        }
    },
    computed: {
        resend() {
            if(this.loading === true) {
                return 'Loading...'
            } else {
                return 'Resend confirmation link'
            }
        }
    },
    methods: {
        sendConfirmationLink() {
            this.loading = true,
            axios.post(this.url, { email: this.email})
                .then(response => (
                    this.verify = response.data.verify ? response.data.verify : '',
                    this.unverify = response.data.unverify ? response.data.unverify : ''
                ))
                .catch(error => (console.log(error)))
                .finally(() => {
                    this.loading =  false
                });
        }
    }
    
}
</script>