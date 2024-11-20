<script lang="ts" setup>
import { useRecordsStore } from '../stores/records/recordsStore';
import FormComponent from './FormComponent.vue';
import TableComponent from './TableComponent.vue';
import MessagesComponent from './MessagesComponent.vue';
import { storeToRefs } from 'pinia';

const formStore = useRecordsStore();
const { keyValues, loading, error, records } = storeToRefs(formStore);

const fetchRecords = async () => {
  try {
    await formStore.fetchRecords();
  } catch (err) {
    console.error(err);
  }
};
</script>

<template>
  <el-card class="parent">
    <!-- Компонент формы -->
    <FormComponent
      v-model:modelValue="keyValues"
      :loading="loading"
      @fetch-records="fetchRecords"
    />
    <!-- Компонент сообщений -->
    <MessagesComponent :error="error" :records="records" />
    <!-- Таблица результатов -->
    <TableComponent v-if="records && records.length > 0" :records="records" />
  </el-card>
</template>

<style scoped lang="scss">
.parent {
  padding: 20px;
}
</style>
