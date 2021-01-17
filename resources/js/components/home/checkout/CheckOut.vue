<template>
  <div class="grid grid-cols-8 gap-x-6 mt-10 mb-20">
    <div class="col-span-5">
      <div class="flex flex-col" v-if="customer != null">
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
            <option value="null" disabled selected>
              Select Country
            </option>
            <option
              :value="customer != null ? customer.country_id : ''"
              disabled
              selected
            >
              {{ customer != null ? customer.country_name : '' }}
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
      <div class="flex flex-col" v-else>
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
    <div class="col-span-3">
      <div class="bg-gray-100 h-96 px-8 flex justify-center items-center">
        <div class="bg-white h-80 w-full">
          <div class="grid grid-cols-2 font-semibold text-xl">
            <p class="col-span-1">Total :</p>
            <p class="col-span-1" v-text="convertToCurrency(totalAmount)"></p>
          </div>
        </div>
      </div>
      <div class="bg-gray-100 p-3">
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
export default {
  async mounted() {
    this.stripe = await loadStripe(
      'pk_test_51IAEgyCC6q7ktBxPr5mBGI5m8jNY92WRsUSCTzurN3TfdycJRozcQ8OzjDKgrlSHv6VgLpjLxy35SJ6E3MkbIvrm00dCoExPDK',
    )

    const elements = this.stripe.elements()
    this.cardElement = elements.create('card', {
      classes: {
        base:
          'bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out',
      },
    })

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
      totalAmount: null,
      paymentProcessing: false,
    }
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
          this.customer.amount = this.totalAmount

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
          this.newCustomer.amount = this.totalAmount

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
        this.totalAmount = res.data[1]
        this.countries = res.data[2]
      })
    },
  },
}
</script>

<style scoped></style>
