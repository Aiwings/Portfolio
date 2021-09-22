<template>
  <div class="field">
    <label :for="name" class="label">{{ title }}</label>
    <div :class="'control ' + (icon ? 'has-icons-left' : '')">
      <input
        :type="type"
        :name="name"
        :value="modelValue"
        :class="'input ' + classname"
        :placeholder="placeholder"
        @input="$emit('update:modelValue', $event.target.value)"
        required
      />
      <span class="icon is-small is-left" v-if="icon">
        <svg-vue class="iconsvg" :icon="icon"></svg-vue>
      </span>
    </div>
    <p :class="'help ' + classname" v-if="message">
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

<style scoped lang="scss" src="./Field.scss">
</style>