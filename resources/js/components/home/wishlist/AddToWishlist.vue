<template>
  <div class="flex items-center font-normal my-3 text-gray-500 relative">
    <a href="/wishlist" class="cursor-pointer text-red-500" v-if="show">
      <i class="fas fa-heart mr-2"></i>
      <span>Browse Wishlist</span>
    </a>
    <span @click="postToWishlist()" class="cursor-pointer" v-else>
      <i class="fas fa-heart mr-2"></i>
      <span>Add To Wishlist</span>
    </span>
    <!-- <p class="mx-2" v-for="(da, i) in data" :key="i">{{ da.id }}</p> -->
    <p
      v-if="msg.length"
      class="box-shadow absolute py-2 max-w-max-content pl-4 pr-10 border transition-all duration-200 ease-linear"
      :class="msgClasses"
    >
      {{ msg }}
    </p>
  </div>
</template>

<script>
    import Axios from 'axios'
    export default {
        name: 'AddToWishlist',
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
                        this.msg = 'Product added to Wishlist'
                        this.msgClasses = 'bg-green-200 border-green-400 text-green-600'
                        setTimeout(() => {
                                this.msg = ''
                            }, 2000);
                        this.show = true
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
