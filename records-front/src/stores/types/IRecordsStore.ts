import { Record, SearchFilters } from './IRecords';

export interface FormState {
  keyValues: SearchFilters[];
  loading: boolean;
  error: string | null;
  records: Record[] | null;
  selectedRecord: Record | null;
}
