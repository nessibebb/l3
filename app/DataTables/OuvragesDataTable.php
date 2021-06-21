<?php

namespace App\DataTables;
use App\Models\Ouvrages;
use App\DataTables\OuvragesDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OuvragesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'ouvragesdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OuvragesDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OuvragesDataTable $model)
    {
        //return $model->newQuery();
        $data = Ouvrages::select();
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('ouvragesdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('type_ouvrage'),
            Column::make('code'),
            Column::make('date_edition'),
            Column::make('editeur'),
            Column::make('nbrpage'),
            Column::make('titre'),
            Column::make('annee_universitaire'),
            Column::make('emplacement'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Ouvrages_' . date('YmdHis');
    }
}
