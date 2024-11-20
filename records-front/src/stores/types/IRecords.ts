export interface RecordAttribute {
  id: string;
  record_id: string;
  key: string;
  value: string;
}

export interface Record {
  id: string;
  access: boolean;
  attributes: RecordAttribute[];
}

export interface SearchFilters {
  key: string;
  value: string;
}
