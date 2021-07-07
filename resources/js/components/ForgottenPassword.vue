<template>
    <div v-if="status" class="text-center text-success fw-bold p-1 mt-3 rounded col-md-12 small ">{{ status }}</div>

            <div v-else-if="showResetForm" class="col-md-12">

                <div class="border border-3 bg-light p-3 mt-3 rounded">

                        <div class="mb-3">

                            <input type="email" @keypress.enter.prevent v-model="email" class="form-control form-control-sm shadow-none" placeholder="Enter your email here">

                            <small v-if="error" class="text-danger mb-3 fw-bold" v-text="error"></small>

                        </div> 

                        <button class="btn btn-sm btn-danger fw-bold shadow-none" :disabled="loading" @click="sendResetLink" type="button">
                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> {{ send }}
                        </button>
                        
                </div>

            </div>

            <div v-else class="mb-3 col-md-auto"> 

                <small class="fw-bold fst-italic shadow-none text-primary btn btn-sm" @click="showForm">Forgotten password?</small>

            </div>
</template> 

<script>
export default {
    data() {
        return { 
            showResetForm: false,
            email: null,
            error: null,
            status: null,
            loading: false,
        }
    },
    watch: {
        email() {
            if(!this.email) {
                return this.error = ''
            }
        },
    },
    computed: {
        send() {
            if(this.loading === true) {
                return 'Loading...'
            } else {
                return 'Send Reset Link'
            }
        }
    },
    methods: {
        showForm() {
            return this.showResetForm = !this.showResetForm 
        },
        sendResetLink() {
            this.loading = true,
            axios.post('http://127.0.0.1:8000/forgot-password', { email: this.email})
            .then(response => (
                    this.error = response.data.email ? response.data.email : '',
                    this.status = response.data.status ? response.data.status : ''
                    ))
                .catch(error => {
                    this.error = error.response.data ? error.response.data.errors.email[0] : '';
                })
                .finally(() => {
                    this.loading =  false
                });
        }
    }
}
</script>