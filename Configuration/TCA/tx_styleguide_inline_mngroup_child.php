<?php

return [
    'ctrl' => [
        'title' => 'Form engine - inline mn group child',
        'label' => 'input_1',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg',
        'versioningWS' => true,
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],

    'columns' => [

        'sys_language_uid' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_styleguide_inline_mngroup',
                'foreign_table_where' => 'AND {#tx_styleguide_inline_mngroup}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_inline_mngroup}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation source',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_styleguide_inline_mngroup',
                'foreign_table_where' => 'AND {#tx_styleguide_inline_mngroup}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_inline_mngroup}.{#uid}!=###THIS_UID###',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],

        'input_1' => [
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'input_1',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'required' => true,
            ],
        ],
        'parents' => [
            'label' => 'parents',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_inline_mngroup_mm',
                'foreign_field' => 'childid',
                'foreign_sortby' => 'childsort',
                'foreign_label' => 'parentid',
                'foreign_unique' => 'parentid',
                'foreign_selector' => 'parentid',
                'maxitems' => 10,
                'appearance' => [
                    'showSynchronizationLink' => 1,
                    'showAllLocalizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                ],
            ],
        ],

    ],

    'types' => [
        '0' => [
            'showitem' => '
                --div--;General, input_1, parents,
                --div--;Visibility, sys_language_uid, l18n_parent,l18n_diffsource, hidden
            ',
        ],
    ],

];
