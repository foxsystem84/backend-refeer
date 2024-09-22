<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pti extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'deposito',
        'user_id',
        'fec_pti',
        'l_maritima',
        'nro_contenedor',
        'tipo_maq',
        'nro_munidad',
        'ano_fab',
        'nro_serie',        
        'ivu_impacto_cover',
        'ivu_perno_montaje',
        'ivu_mon_comp_mvv',
        'ivu_prot_comp',
        'ivu_panel_ame',
        'ivu_ven_aire',
        'ivu_panel_acc_calen',
        'ivu_pta_cce',
        'ivu_rej_ven_con',
        'ivu_baja_caja',
        'ie_cable_ee',
        'ie_rompe_cto',
        'ie_cable_cone',
        'ie_contactor',
        'ie_int_seg',
        'ie_compresor',
        'ie_mot_eva1',
        'ie_mot_eva2',
        'ie_mot_cond',
        'ie_calentador',
        'cee_compresor',
        'cee_mot_eva1_bv',
        'cee_mot_eva1_av',
        'cee_mot_eva2_bv',
        'cee_mot_eva2_av',
        'cee_mot_eva2_mcc',
        'cee_mot_eva2_mc2v',
        'cee_mot_eva2_cal',
        'ifg_nv_aceite',
        'ifg_hum_refri',
        'ifg_evaporador',
        'ifg_condensador',
        'ifg_dir_filtro_sec_car',
        'ifg_dir_filtro_sec_star',
        'ifg_tuberia',
        'ifg_pres_succion',
        'ifg_pres_descarga',
        'com_drenajes',
        'insp_rot_vent_eva',
        'ic_soft',
        'ic_config',
        'ic_id_contenedor',
        'ic_fecha',
        'ic_hr',
        'ic_dal86',
        'ic_paq_bateria',
        'ic_teclado',
        'ic_display',
        'ic_borra_alarma',
        'ic_rev_telematic',
        'uo_ejec_pti2',
        'uo_trab_und_0c',
        'uo_trab_und_defrost',
        'uo_trab_und_20c',
        'uo_max_temp',
        'observacion'
        
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
