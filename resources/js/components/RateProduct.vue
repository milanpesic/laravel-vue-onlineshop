<template>

<div v-if="formIsNotSended">

    <button class="btn btn-success btn-sm fw-bold small shadow-none" @click="showReviewForm">RATE THIS PRODUCT</button>

    <div v-if="showOrHideReviewForm" :id="'review_'+productId">
                              
        <div class="mb-3">
                                            
            <label for="rate" class="form-label fw-bold">Rate this product</label>
                <select v-model="form.rate" class="form-select"> 
                                             
                    <option v-for="i in 5" :key="i" class="fw-bold" :value="i" v-text="i"></option>
                </select>
                
                <small v-if="errorRate" class="text-danger mb-3 fw-bold" v-text="errorRate"></small>
                                            
        </div>
                
        <div class="mb-3">
            <label for="review" class="form-label fw-bold">Write product review</label>
            <textarea v-model="form.review" class="form-control" rows="5"></textarea>
                
            <small v-if="errorReview" class="text-danger mb-3 fw-bold" v-text="errorReview"></small>
                
        </div>

        <button v-if="loading === false" :id="'button_send_review_'+productId" class="btn btn-primary btn-sm fw-bold" @click="sendReview" type="button">Send Review</button>

        <button v-else class="btn btn-warning btn-sm fw-bold small shadow-none" :id="'button_sending_'+productId" :disabled="loading" type="button">
            <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...
        </button>

    </div>

</div>

<div v-if="formIsSended">
    <div class="row m-1">
        <div class="col-md-12 alert alert-warning fw-bold small">Your review is added successfully, waiting for confirmation.</div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        productId: {
            type: [String, Number]
        },
        reviewRoute: {
            type: [String]
        },
    }, 
    data() {
        return {
            showOrHideReviewForm: false,
            formIsNotSended: true,
            formIsSended: false,
            loading: false,
            errorRate: null,
            errorReview: null,
            form: {
                rate: null, 
                review: null, 
                product_id: this.productId
            }
        }
    },
    methods: {
        showReviewForm() {
            return this.showOrHideReviewForm = !this.showOrHideReviewForm
        },
        sendReview() {
            this.loading = true, 
            axios.post(this.reviewRoute, this.form)
            .then(response => (response.data, this.formIsNotSended = false, this.formIsSended = true
            ))
            .catch(error => {
                this.errorRate = error.response.data ? error.response.data.errors.rate[0] : '',
                this.errorReview = error.response.data ? error.response.data.errors.review[0] : ''
            })
            .finally(() => {
                this.loading = false
            });
        }, 
    },
    
}
</script>