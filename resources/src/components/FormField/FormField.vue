<template>
  <div class="FormField">
    <label
      :for="name"
      class="label"
    >{{ title }}</label>
    <div :class="'control ' + (icon ? 'has-icons-left' : '')">
      <input
        :type="type"
        :name="name"
        :value="modelValue"
        :class="'input ' + classname"
        :placeholder="placeholder"
        required
        @input="$emit('update:modelValue', $event.target.value)"
      >
      <span
        v-if="icon"
        class="icon is-small is-left"
      >
        <svg-vue
          class="iconsvg"
          :icon="icon"
        />
      </span>
    </div>
    <p
      v-if="message"
      :class="'help ' + classname"
    >
      {{ message }}
    </p>
  </div>
</template>

<script>
let required = {
  type: String,
  required: true,
};
let optional = {
  type: String,
  required: false,
};
export default {
  props: {
    name: required,
    title: required,
    type: required,
    icon: optional,
    message: optional,
    placeholder: {
      type: String,
      default: "",
    },
    modelValue: {
      type: String,
      default:"",
    },
  },
  emits: ["update:modelValue"],
  computed: {
    classname: function () {
      return this.modelValue && !this.message ? "is-success" : "is-danger";
    },
  },
};
</script>

<style scoped lang="scss" src="./FormField.scss">
</style>