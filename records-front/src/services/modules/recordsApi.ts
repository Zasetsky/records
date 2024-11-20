import { Record, SearchFilters } from '../../stores/types/IRecords';
import httpClient from '../http';

export class RecordsApi {
  /**
   * Поиск записей по ключам и значениям
   * @param filters массив фильтров с ключами и значениями
   */
  static async searchRecords(filters: SearchFilters[]): Promise<Record[]> {
    const response = await httpClient.post<{ data: Record[] }>(
      '/records/search',
      {
        filters,
      }
    );
    return response.data.data;
  }

  /**
   * Получение записи по идентификатору
   * @param id идентификатор записи
   */
  static async getRecordById(id: string): Promise<Record> {
    const response = await httpClient.get<{ data: Record }>(`/records/${id}`);
    return response.data.data;
  }
}

export const recordsApi = RecordsApi;
