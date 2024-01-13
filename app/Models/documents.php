<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $fillable = [
//        'document_number',
//        'document_id',
//        'another_title',
//        'inflectional_title',
//        'name',
//        'creator',
//        'collection',
//        'source',
        'date',
//        'replication',
//        'Replication_specification_note',
//        'language',
        'appearance_characteristics',
        'notes_appearance',
        'general_note',
        'sources_work',
        'uncontrolled_subjects',
        'maintenance_center',
        'country',
        'city',
        'version_recovery_number',
        'note',
        'start_finish_version',
        'introducing_version',
        'scope_content',
        'descriptor',
        'publication',
        'frost',
        'ISBN',
        'contents',
        'subject',
        'added_ID',
        'congress_classification',
        'dewey_classification',
        'national_bibliography_number',
        'status_editor',
        'image',
        'editedBy',
        ];

    public function editor()
    {
        return $this->belongsTo(User::class  ,'editedBy');
    }


}
