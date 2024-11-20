<script lang="ts" setup>
import { PropType } from 'vue';
import { Record } from '../stores/types/IRecords';

defineProps({
  records: Array as PropType<Record[]>,
});
</script>

<template>
  <el-table :data="records" style="width: 100%" class="table">
    <el-table-column label="Доступ">
      <template #default="scope">
        <el-tag v-if="scope.row.access" type="success">Доступен</el-tag>
        <el-tag v-else type="danger">Недоступен</el-tag>
      </template>
    </el-table-column>
    <el-table-column label="Атрибуты">
      <template #default="scope">
        <el-table
          :data="scope.row.attributes"
          size="small"
          border
          style="margin: 10px 0"
        >
          <el-table-column prop="key" label="Ключ"></el-table-column>
          <el-table-column prop="value" label="Значение"></el-table-column>
        </el-table>
      </template>
    </el-table-column>
  </el-table>
</template>

<style scoped lang="scss">
.table {
  margin-top: 20px;
}
</style>
