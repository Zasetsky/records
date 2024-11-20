<script lang="ts" setup>
import { PropType } from 'vue';
import { Record } from '../stores/types/IRecords';

defineProps({
  error: {
    type: String as PropType<string | null>,
    default: null,
  },
  records: {
    type: Array as PropType<Record[] | null>,
    default: null,
  },
});
</script>

<template>
  <div v-if="error" class="message message--error">
    {{ error }}
  </div>
  <div v-else-if="records && records.length === 0" class="message">
    Записи не найдены.
  </div>
</template>

<style scoped lang="scss">
.message {
  margin-top: 20px;
  font-size: 14px;

  &--error {
    color: red;
  }
}
</style>
