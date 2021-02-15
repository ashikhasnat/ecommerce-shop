<template>
  <div class="grid grid-cols-1 md:grid-cols-8 gap-x-6 mt-10 mb-20">
    <div class="col-span-1 md:col-span-5">
      <div class="flex flex-col px-8" v-if="customer != null">
        <h1 class="text-xl uppercase mb-6 font-bold">Billing Address</h1>
        <div class="mb-3">
          <label for="first_name">
            First Name
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="first_name"
            :value="customer != null ? customer.first_name : ''"
          />
        </div>
        <div class="mb-3">
          <label for="last_name">
            Last Name
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="last_name"
            :value="customer != null ? customer.last_name : ''"
          />
        </div>
        <div class="mb-3">
          <label for="company_name">Company Name (optional)</label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="company_name"
            :value="customer != null ? customer.company_name : ''"
          />
        </div>
        <div class="mb-3">
          <label for="company_name">
            Country / Region
            <span class="text-red-500">*</span>
          </label>
          <select
            class="w-full border py-1 px-2 focus:outline-none cursor-pointer"
            name="country_id"
          >
            <option value="null" selected disabled>Selected</option>
            <option
              :value="customer != null ? customer.country_id : ''"
              selected
            >
              {{ customer != null ? customer.country_name : '' }}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="street_address">
            Street address
            <span class="text-red-500">*</span>
          </label>
          <input
            :value="customer != null ? customer.street_address : ''"
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="street_address"
            placeholder="House Number and Street Number"
          />
        </div>
        <div class="mb-3">
          <label for="city">
            Town / City
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="city"
            :value="customer != null ? customer.city : ''"
          />
        </div>
        <div class="mb-3">
          <label for="post_code">
            Postcode / ZIP
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="post_code"
            :value="customer != null ? customer.post_code : ''"
          />
        </div>
        <div class="mb-3">
          <label for="phone">
            Phone
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="phone"
            :value="customer != null ? customer.phone : ''"
          />
        </div>
        <div class="mb-3">
          <label for="email">
            Email
            <span class="text-red-500">*</span>
          </label>
          <input
            :value="customer != null ? customer.email : ''"
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="email"
            name="email"
          />
        </div>
      </div>
      <div class="flex flex-col px-8" v-else>
        <h1 class="text-xl uppercase mb-6 font-bold">Billing Address</h1>

        <div class="mb-3">
          <label for="first_name">
            First Name
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="first_name"
            v-model="newCustomer.first_name"
          />
        </div>
        <div class="mb-3">
          <label for="last_name">
            Last Name
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="last_name"
            v-model="newCustomer.last_name"
          />
        </div>
        <div class="mb-3">
          <label for="company_name">Company Name (optional)</label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="company_name"
            v-model="newCustomer.company_name"
          />
        </div>
        <div class="mb-3">
          <label for="company_name">
            Country / Region
            <span class="text-red-500">*</span>
          </label>
          <select
            class="w-full border py-1 px-2 focus:outline-none cursor-pointer"
            name="country_id"
            v-model="newCustomer.country_id"
          >
            <option value="null" disabled selected>
              Select Country
            </option>

            <option
              v-for="(country, i) in countries"
              :key="i"
              :value="country.id"
            >
              {{ country.country_name }}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="street_address">
            Street address
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="street_address"
            placeholder="House Number and Street Number"
            v-model="newCustomer.street_address"
          />
        </div>
        <div class="mb-3">
          <label for="city">
            Town / City
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="city"
            v-model="newCustomer.city"
          />
        </div>
        <div class="mb-3">
          <label for="post_code">
            Postcode / ZIP
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="post_code"
            v-model="newCustomer.post_code"
          />
        </div>
        <div class="mb-3">
          <label for="phone">
            Phone
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="text"
            name="phone"
            v-model="newCustomer.phone"
          />
        </div>
        <div class="mb-3">
          <label for="email">
            Email
            <span class="text-red-500">*</span>
          </label>
          <input
            class="w-full border focus:outline-none py-1 px-3 mt-1"
            type="email"
            name="email"
            v-model="newCustomer.email"
          />
        </div>
      </div>
    </div>
    <!-- Total amount and [payment] -->
    <div class="col-span-1 md:col-span-3">
      <div class="bg-gray-100 w-full p-6 flex justify-center items-center">
        <div class="bg-white w-full p-2">
          <div class="flex font-semibold py-4 text-sm border-b border-gray-200">
            <h1 class="ml-4 flex-1">Product</h1>
            <h1 class="ml-4 flex-1">Sub Total</h1>
          </div>
          <div
            class="grid grid-cols-2 text-sm text-gray-500"
            v-for="(product, i) in AllCartItem"
            :key="i"
          >
            <div class="col-span-1 ml-4 my-2">
              <p class="">
                {{ product.title }} x
                <span class="text-gray-700">{{ product.quantity }}</span>
              </p>
            </div>
            <div class="col-span-1 ml-4 my-2 text-gray-900">
              <p class="" v-text="convertToCurrency(product.sub_total)"></p>
            </div>
          </div>
          <div class="">
            <slot name="session_coupon"></slot>
          </div>
          <div class="flex text-xl mt-6 mb-2">
            <p class="flex-1 ml-4">Total :</p>
            <p
              class="flex-1 ml-4 text-teal-500 font-semibold"
              v-text="convertToCurrency(getTotalAmount)"
            ></p>
          </div>
        </div>
      </div>
      <div class="bg-gray-100 p-4">
        <div class="">
          <div class="">
            <label for="card-element">Credit Card Information</label>
            <div id="card-element"></div>
          </div>
        </div>
        <div class="mt-4">
          <button
            @click="processPayment"
            class="focus:outline-none py-2 px-6 bg-gray-700 text-white hover:bg-gray-800"
            v-text="paymentProcessing ? 'Processing' : 'Pay Now'"
          ></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { loadStripe } from '@stripe/stripe-js'
import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  async mounted() {
    this.stripe = await loadStripe(process.env.MIX_STRIPE_KEY)

    const elements = this.stripe.elements()
    this.cardElement = elements.create('card', {
      classes: {
        base:
          'bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out',
      },
    })
    this.$store.dispatch('fetchTotalAmount')
    this.cardElement.mount('#card-element')
    this.fetchAddressAndAmount()
  },
  data() {
    return {
      stripe: {},
      cardElement: {},
      countries: [],
      customer: null,
      newCustomer: {
        first_name: '',
        last_name: '',
        company_name: '',
        email: '',
        street_address: '',
        city: '',
        country_id: '',
        post_code: '',
        phone: '',
      },
      paymentProcessing: false,
    }
  },
  computed: {
    ...mapGetters({
      getTotalAmount: 'getTotalAmount',
      AllCartItem: 'AllCartItem',
    }),
  },
  methods: {
    async processPayment() {
      this.paymentProcessing = true

      const { paymentMethod, error } = await this.stripe.createPaymentMethod({
        type: 'card',
        card: this.cardElement,
        billing_details: {
          name:
            this.customer != null
              ? this.customer.first_name + ' ' + this.customer.last_name
              : this.newCustomer.first_name + ' ' + this.newCustomer.last_name,
          email:
            this.customer != null
              ? this.customer.email
              : this.newCustomer.email,
          address: {
            line1:
              this.customer != null
                ? this.customer.street_address
                : this.newCustomer.street_address,
            city:
              this.customer != null
                ? this.customer.city
                : this.newCustomer.city,
            state:
              this.customer != null
                ? this.customer.country_name
                : this.newCustomer.country_id.toString(),
            postal_code:
              this.customer != null
                ? this.customer.post_code
                : this.newCustomer.post_code,
          },
        },
      })

      if (error) {
        this.paymentProcessing = false
        alert(error)
      } else {
        if (this.customer != null) {
          this.customer.payment_method_id = paymentMethod.id
          this.customer.amount = this.getTotalAmount

          axios
            .post('/api/purchase', this.customer)
            .then((res) => {
              this.paymentProcessing = false
              this.$store.commit('setClasses', 'success')
              this.$store.commit('setToastrMsg', 'Payment Received')
              setTimeout(() => {
                this.$store.commit('setToastrMsg', '')
              }, 5000)
              location.replace('/order-summary')
              console.log(res)
            })
            .catch((error) => {
              this.paymentProcessing = false
              console.error(error)
            })
        } else {
          this.newCustomer.payment_method_id = paymentMethod.id
          this.newCustomer.amount = this.getTotalAmount

          axios
            .post('/api/purchase', this.newCustomer)
            .then((res) => {
              this.paymentProcessing = false
              this.$store.commit('setClasses', 'success')
              this.$store.commit('setToastrMsg', 'Payment Received')
              setTimeout(() => {
                this.$store.commit('setToastrMsg', '')
              }, 5000)
              location.replace('/order-summary')
              console.log(res)
            })
            .catch((error) => {
              this.paymentProcessing = false
              console.error(error)
            })
        }
      }
    },
    fetchAddressAndAmount() {
      axios.get('/api/checkout').then((res) => {
        this.customer = res.data[0]
        this.countries = res.data[1]
      })
    },
  },
}
</script>

<style scoped></style>
