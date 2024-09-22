<?php

namespace App\Http\Controllers;

use App\Models\Pti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PtiController extends Controller
{
    public function Index(Request $request)
    {
        $ptis = Pti::where('user_id', $request->user_id)->get();
        return response()->json(['pti' => $ptis]);
    }

    public function getPtisbyUser($userId)
    {
        $user = User::findOrFail($userId);
        $pti = $user->ptis;
        return response()->json([
            'user'=>['name'=>$user->name, 'local'=> $user->local],
            'pti'=>$pti
        ]);
    }
    public function Store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=>'integer',
            'deposito'=> 'required|string',            
            'l_maritima'=> 'required|string',
            'nro_contenedor'=>'required|string',
            'tipo_maq'=>'required|string',
            'nro_munidad'=>'required|string',
            'ano_fab'=>'required|string',
            'nro_serie'=>'required|string',                    
            'ivu_impacto_cover'=>'nullable|in:existe,no existe,falla',/**/
            'ivu_perno_montaje'=>'nullable|in:existe,no existe,falla',
            'ivu_mon_comp_mvv'=>'nullable|in:existe,no_existe,falla',
            'ivu_prot_comp'=>'nullable|in:existe,no existe,falla',      
            'ivu_panel_ame'=>'nullable|in:existe,no existe,falla',
            'ivu_ven_aire'=>'nullable',
            'ivu_panel_acc_calen'=>'nullable',
            'ivu_pta_cce'=>'nullable',
            'ivu_rej_ven_con'=>'nullable',
            'ivu_baja_caja'=>'nullable',
            'ie_cable_ee'=>'nullable',/**/
            'ie_rompe_cto'=>'nullable',
            'ie_cable_cone'=>'nullable',
            'ie_contactor'=>'nullable',
            'ie_int_seg'=>'nullable',
            'ie_compresor'=>'nullable|integer',
            'ie_mot_eva1'=>'nullable|integer',
            'ie_mot_eva2'=>'nullable|integer',
            'ie_mot_cond'=>'nullable|integer',
            'ie_calentador'=>'nullable|integer',
            'cee_compresor'=>['nullable', 'numeric', 'between:0,9999.99'],/**/
            'cee_mot_eva1_bv'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva1_av'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_bv'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_av'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_mcc'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_mc2v'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_cal'=>['nullable', 'numeric', 'between:0,9999.99'],
            'ifg_nv_aceite'=>'nullable',/* */
            'ifg_hum_refri'=>'nullable',
            'ifg_evaporador'=>'nullable',
            'ifg_condensador'=>'nullable',
            'ifg_dir_filtro_sec_car'=>'nullable',
            'ifg_dir_filtro_sec_star'=>'nullable',
            'ifg_tuberia'=>'nullable',
            'ifg_pres_succion'=>'nullable|float',
            'ifg_pres_descarga'=>'nullable|float',
            'com_drenajes'=>'nullable',/* */
            'insp_rot_vent_eva'=>'nullable',
            'ic_soft' =>'nullable|string',/* */
            'ic_config' =>'nullable|string',
            'ic_id_contenedor' =>'nullable|string',
            'ic_fecha' =>'nullable',
            'ic_hr' =>'nullable',
            'ic_dal86' =>'nullable',
            'ic_paq_bateria' =>'nullable',
            'ic_teclado' =>'nullable',
            'ic_display' =>'nullable',
            'ic_borra_alarma' =>'nullable',
            'ic_rev_telematic' =>'nullable',
            'uo_ejec_pti2' =>'nullable',/* */
            'uo_trab_und_0c' =>'nullable',
            'uo_trab_und_defrost' =>'nullable',
            'uo_trab_und_20c' =>'nullable',
            'uo_max_temp' =>'nullable|integer',
            'observacion'=>'nullable|string'/* */
            ]);

            $pti = Pti::create($validatedData);
            return response()->json(['pti' => $pti], 201);
    }

    public function update(Request $request,$id)
    {   
        $pti = Pti::findOrFail($id);
        $validatedData = $request->validate([
            'user_id'=>'integer',
            'deposito'=> 'required|string',            
            'l_maritima'=> 'required|string',
            'nro_contenedor'=>'required|string',
            'tipo_maq'=>'required|string',
            'nro_munidad'=>'required|string',
            'ano_fab'=>'required|string',
            'nro_serie'=>'required|string',                    
            'ivu_impacto_cover'=>'nullable|in:existe,no existe,falla',/**/
            'ivu_perno_montaje'=>'nullable|in:existe,no existe,falla',
            'ivu_mon_comp_mvv'=>'nullable|in:existe,no_existe,falla',
            'ivu_prot_comp'=>'nullable|in:existe,no existe,falla',      
            'ivu_panel_ame'=>'nullable|in:existe,no existe,falla',
            'ivu_ven_aire'=>'nullable',
            'ivu_panel_acc_calen'=>'nullable',
            'ivu_pta_cce'=>'nullable',
            'ivu_rej_ven_con'=>'nullable',
            'ivu_baja_caja'=>'nullable',
            'ie_cable_ee'=>'nullable',/**/
            'ie_rompe_cto'=>'nullable',
            'ie_cable_cone'=>'nullable',
            'ie_contactor'=>'nullable',
            'ie_int_seg'=>'nullable',
            'ie_compresor'=>'nullable|integer',
            'ie_mot_eva1'=>'nullable|integer',
            'ie_mot_eva2'=>'nullable|integer',
            'ie_mot_cond'=>'nullable|integer',
            'ie_calentador'=>'nullable|integer',
            'cee_compresor'=>['nullable', 'numeric', 'between:0,9999.99'],/**/
            'cee_mot_eva1_bv'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva1_av'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_bv'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_av'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_mcc'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_mc2v'=>['nullable', 'numeric', 'between:0,9999.99'],
            'cee_mot_eva2_cal'=>['nullable', 'numeric', 'between:0,9999.99'],
            'ifg_nv_aceite'=>'nullable',/* */
            'ifg_hum_refri'=>'nullable',
            'ifg_evaporador'=>'nullable',
            'ifg_condensador'=>'nullable',
            'ifg_dir_filtro_sec_car'=>'nullable',
            'ifg_dir_filtro_sec_star'=>'nullable',
            'ifg_tuberia'=>'nullable',
            'ifg_pres_succion'=>'nullable|float',
            'ifg_pres_descarga'=>'nullable|float',
            'com_drenajes'=>'nullable',/* */
            'insp_rot_vent_eva'=>'nullable',
            'ic_soft' =>'nullable|string',/* */
            'ic_config' =>'nullable|string',
            'ic_id_contenedor' =>'nullable|string',
            'ic_fecha' =>'nullable',
            'ic_hr' =>'nullable',
            'ic_dal86' =>'nullable',
            'ic_paq_bateria' =>'nullable',
            'ic_teclado' =>'nullable',
            'ic_display' =>'nullable',
            'ic_borra_alarma' =>'nullable',
            'ic_rev_telematic' =>'nullable',
            'uo_ejec_pti2' =>'nullable',/* */
            'uo_trab_und_0c' =>'nullable',
            'uo_trab_und_defrost' =>'nullable',
            'uo_trab_und_20c' =>'nullable',
            'uo_max_temp' =>'nullable|integer',
            'observacion'=>'nullable|string'/* */
            ]);
    }

    public function delete($id)
    {
        $pti = Pti::findOrFail($id);
        $pti->delete();
        return response()->json(['message' => 'Pti eliminado satisfactoriamente']);
    }
    
}
