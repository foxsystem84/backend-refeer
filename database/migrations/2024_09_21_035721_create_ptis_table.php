<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ptis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string("deposito");
            $table->timestamp("fec_pti");
            $table->string("l_maritima");
            $table->string("nro_contenedor");
            $table->string("tipo_maq");
            $table->string("nro_munidad");
            $table->char("ano_fab", length:4);
            $table->string("nro_serie");            
            $table->enum("ivu_impacto_cover",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_perno_montaje",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_mon_comp_mvv",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_prot_comp",['existe', 'no existe', 'falla'])->nullable();          
            $table->enum("ivu_panel_ame",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_ven_aire",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_panel_acc_calen",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_pta_cce",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_rej_ven_con",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ivu_baja_caja",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ie_cable_ee",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ie_rompe_cto",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ie_cable_cone",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ie_contactor",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ie_int_seg",['existe', 'no existe', 'falla'])->nullable();
            $table->integer("ie_compresor")->nullable();
            $table->integer("ie_mot_eva1")->nullable();
            $table->integer("ie_mot_eva2")->nullable();
            $table->integer("ie_mot_cond")->nullable();
            $table->integer("ie_calentador")->nullable();
            $table->float("cee_compresor")->nullable();
            $table->float("cee_mot_eva1_bv")->nullable();
            $table->float("cee_mot_eva1_av")->nullable();
            $table->float("cee_mot_eva2_bv")->nullable();
            $table->float("cee_mot_eva2_av")->nullable();
            $table->float("cee_mot_eva2_mcc")->nullable();
            $table->float("cee_mot_eva2_mc2v")->nullable();
            $table->float("cee_mot_eva2_cal")->nullable();
            $table->enum("ifg_nv_aceite",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ifg_hum_refri",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ifg_evaporador",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ifg_condensador",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ifg_dir_filtro_sec_car",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ifg_dir_filtro_sec_star",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ifg_tuberia",['existe', 'no existe', 'falla'])->nullable();
            $table->float("ifg_pres_succion")->nullable();
            $table->float("ifg_pres_descarga")->nullable();
            $table->enum("com_drenajes",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("insp_rot_vent_eva",['existe', 'no existe', 'falla'])->nullable();
            $table->char("ic_soft", length:10)->nullable();
            $table->char("ic_config",length:10)->nullable();
            $table->char("ic_id_contenedor",length:10)->nullable();
            $table->enum("ic_fecha",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_hr",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_dal86",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_paq_bateria",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_teclado",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_display",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_borra_alarma",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("ic_rev_telematic",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("uo_ejec_pti2",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("uo_trab_und_0c",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("uo_trab_und_defrost",['existe', 'no existe', 'falla'])->nullable();
            $table->enum("uo_trab_und_20c",['existe', 'no existe', 'falla'])->nullable();
            $table->integer("uo_max_temp")->nullable();
            $table->text("observacion")->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ptis');
    }
};
