<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property integer $branch_id
 * @property integer $companies_company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_created_date
 *
 * @property Companies $companiesCompany
 * @property Departments[] $departments
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companies_company_id', 'branch_name', 'branch_created_date'], 'required'],// 'branch_address', 'branch_status'
            [['companies_company_id'], 'integer'],
            [['branch_created_date'], 'safe'],
            ['branch_name','unique'],
            ['branch_address','required','when'=>function ($model){
                return (!empty($model->branch_address)) ? true : false;
            },'whenClient'=>"function(){
                
                if( $('#branch_address').val()===undefined ){
                    false;
                }else{
                    true;
                }
            }"],
            [['branch_name', 'branch_address'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'companies_company_id' => 'Companies Company Name',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_created_date' => 'Branch Create Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'companies_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['branches_branch_id' => 'branch_id']);
    }
}