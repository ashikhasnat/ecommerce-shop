<template>
  <div class="flex items-center font-normal my-3 relative">
    <a
      href="/wishlist"
      class="cursor-pointer bg-white text-red-500 hover:bg-red-500 hover:text-white rounded-full text-center pt-2 pb-1 px-2"
      v-if="show"
    >
      <i class="far fa-heart text-2xl"></i>
    </a>
    <span
      @click="postToWishlist()"
      class="cursor-pointer bg-white text-gray-700 hover:text-white rounded-full text-center pt-2 pb-1 px-2 hover:bg-red-500"
      v-else
    >
      <i class="far fa-heart text-2xl"></i>
    </span>
    <p
      v-if="msg.length"
      class="box-shadow text-xs absolute py-2 max-w-max-content px-4 border transition-all duration-200 ease-linear capitalize"
      :class="msgClasses"
    >
      {{ msg }}
    </p>
  </div>
</template>

<script>
    import Axios from 'axios'
    export default {
        name: 'AddToWishlistHome',
        props: ['product-id'],
        data() {
            return {
                msg: '',
                msgClasses: '',
                data: '',
                show: null
            }
        },
        mounted () {
            this.fetchWishlistData()
        },
        methods: {
            postToWishlist() {
                Axios.post('/api/wishlist',{
                    'product_id': this.productId
                })
                    .then((res) => {
                        this.msg = 'added'
                        this.msgClasses = 'bg-green-100 border-green-400 text-green-600'
                        setTimeout(() => {
                                this.msg = ''
                            }, 2000);
                        this.show = true
                        this.$store.dispatch('fetchWishlistDataTotal')
                    })
                    .catch((error) => {
                        if (error.response.status == 500) {
                        // Request made and server responded
                            this.msg = 'Product already in Wishlist'
                            this.msgClasses = 'bg-red-200 border-red-400 text-red-600'
                            setTimeout(() => {
                                this.msg = ''
                            }, 2000);
                        }
                    })
            },
            fetchWishlistData(){
                Axios.get('/api/wishlist')
                    .then((res) => {
                        this.data = res.data
                    this.data.forEach(element => {
                        if (element.product_id == this.productId) {
                           return this.show = true
                        }  
                        });
                    })
            }
            
        },
    }
</script>
