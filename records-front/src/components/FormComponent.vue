<script lang="ts" setup>
import { PropType } from 'vue';
import { SearchFilters } from '../stores/types/IRecords';

const props = defineProps({
  modelValue: {
    type: Array as PropType<SearchFilters[]>,
    required: true,
  },
  loading: Boolean,
});

const emit = defineEmits(['update:modelValue', 'fetch-records']);

// Функция для добавления нового поля
const addField = () => {
  const newField = { key: '', value: '' };
  emit('update:modelValue', [...props.modelValue, newField]);
};

// Функция для удаления поля
const removeField = (index: number) => {
  if (props.modelValue.length > 1) {
    const updatedValues = props.modelValue.filter((_, i) => i !== index);
    emit('update:modelValue', updatedValues);
  }
};
</script>

<template>
  <el-form class="form">
    <!-- Поля ввода -->
    <el-row v-for="(item, index) in modelValue" :key="index" class="form__row">
      <el-col :span="10">
        <el-input
          v-model="item.key"
          class="form__input"
          placeholder="Введите ключ"
        ></el-input>
      </el-col>
      <el-col :span="10">
        <el-input
          v-model="item.value"
          class="form__input"
          placeholder="Введите значение"
        ></el-input>
      </el-col>
      <el-col :span="1" class="form__actions">
        <el-button
          type="danger"
          @click="removeField(index)"
          :disabled="modelValue.length === 1"
          circle
        ></el-button>
      </el-col>
    </el-row>
    <!-- Кнопка добавления нового поля -->
    <el-button
      type="primary"
      class="form__button form__button--add"
      @click="addField"
    >
      Добавить поле
    </el-button>
    <!-- Кнопка вызова API -->
    <el-button
      type="success"
      class="form__button"
      @click="$emit('fetch-records')"
      :loading="loading"
    >
      Получить
    </el-button>
  </el-form>
</template>

<style scoped lang="scss">
.form {
  &__row {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  &__input {
    width: 100%;
  }

  &__actions {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  &__button {
    margin-top: 10px;

    &--add {
      margin-right: 10px;
    }
  }
}
</style>
