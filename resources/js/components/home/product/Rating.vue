<template>
  <div>
    <div class="star-rating">
      <label
        class="star-rating__star"
        v-for="(rating, i) in ratings"
        :key="i"
        :class="{
          'is-selected': value >= rating && value != null,
          'is-disabled': disabled,
        }"
        v-on:click="set(rating)"
        v-on:mouseover="star_over(rating)"
        v-on:mouseout="star_out"
      >
        <input
          class="star-rating star-rating__checkbox"
          type="radio"
          :value="rating"
          v-model="value"
          :disabled="disabled"
          name="ratings"
        />★</label
      >
    </div>
  </div>
</template>

<script>
    export default { 

  props: {
    'disabled': Boolean,
    'required': Boolean
  },
  /*
   * Initial state of the component's data.
   */
  data: function() {
    return {
      temp_value: null,
      ratings: [1, 2, 3, 4, 5],
      value: null
    };
  },

  methods: {
    /*
     * Behaviour of the stars on mouseover.
     */
    star_over: function(index) {
      var self = this;

      if (!this.disabled) {
        this.temp_value = this.value;
        return this.value = index;
      }

    },

    /*
     * Behaviour of the stars on mouseout.
     */
    star_out: function() {
      var self = this;

      if (!this.disabled) {
        return this.value = this.temp_value;
      }
    },

    /*
     * Set the rating.
     */
    set: function(value) {
      var self = this;

      if (!this.disabled) {
        this.temp_value = value;
        return this.value = value;
      }
    }
  }

    }
</script>

<style scoped>
.star-rating__checkbox {
  position: absolute;
  overflow: hidden;
  clip: rect(0 0 0 0);
  height: 1px;
  width: 1px;
  margin: -1px;
  padding: 0;
  border: 0;
}

.star-rating__star {
  display: inline-block;
  padding: 3px;
  vertical-align: middle;
  line-height: 1;
  font-size: 1.5em;
  color: #ababab;
  transition: color 0.3s ease-in-out;
}
.star-rating__star:hover {
  cursor: pointer;
}
.star-rating__star.is-selected {
  color: #ffd900c2;
}
.star-rating__star.is-disabled:hover {
  cursor: default;
}
</style>