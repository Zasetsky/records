import { defineStore } from 'pinia';
import { SearchFilters } from '../types/IRecords';
import { recordsApi } from '../../services';
import { FormState } from '../types/IRecordsStore';
import axios from 'axios';

export const useRecordsStore = defineStore('records', {
  state: (): FormState => ({
    keyValues: [{ key: '', value: '' }],
    loading: false,
    error: null,
    records: null,
    selectedRecord: null,
  }),

  actions: {
    /**
     * Поиск записей по ключам и значениям
     */
    async fetchRecords() {
      this.loading = true;
      this.error = null;
      this.records = null;

      try {
        const filters: SearchFilters[] = this.keyValues.map((kv) => ({
          key: kv.key,
          value: kv.value,
        }));

        this.records = await recordsApi.searchRecords(filters);
      } catch (err) {
        if (axios.isAxiosError(err) && err.response?.data?.message) {
          this.error = err.response.data.message;
        } else if (err instanceof Error) {
          this.error = err.message;
        } else {
          this.error = 'Неизвестная ошибка при поиске записей.';
        }
      } finally {
        this.loading = false;
      }
    },

    /**
     * Получение записи по ID
     * @param id идентификатор записи
     */
    async fetchRecordById(id: string) {
      this.loading = true;
      this.error = null;
      this.selectedRecord = null;

      try {
        this.selectedRecord = await recordsApi.getRecordById(id);
      } catch (err) {
        if (axios.isAxiosError(err) && err.response?.data?.message) {
          this.error = err.response.data.message;
        } else {
          this.error = 'Неизвестная ошибка при получении записи.';
        }
      } finally {
        this.loading = false;
      }
    },
  },
});
