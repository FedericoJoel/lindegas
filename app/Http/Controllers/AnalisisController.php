<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\MatrizRepo;
use App\Repositories\OperadorRepo;
use App\Repositories\PerfilRepo;
use App\Repositories\DutyRepo;

use Illuminate\Http\Request;

class AnalisisController extends Controller
{

    private $repo;

    public function __construct(MatrizRepo $repo)
    {
        $this->repo = $repo;
    }

    public function liteAnalisis()
    {
//        $results = collect(['Critical' => 130,'High' => 223,'Medium' => 156,'Low' => 218]);
        $results = DB::select("
            SELECT
              SUM(CASE WHEN criticidad = 'Critica' THEN 1 ELSE 0 END) as 'Critical',
              SUM(CASE WHEN criticidad = 'High' THEN 1 ELSE 0 END) as 'High',
              SUM(CASE WHEN criticidad = 'Medium' THEN 1 ELSE 0 END) as 'Medium',
              SUM(CASE WHEN criticidad = 'Low' THEN 1 ELSE 0 END) as 'Low'
              FROM(
                SELECT
                    primerset.criticidad
                  FROM
                    ((SELECT Rel_Operador_Perfil.operador  AS 'operador1', Rel_Operador_Perfil.sucursal_operador as 'sucursal1', Duty.nombre AS 'D1', Matriz.criticidad AS 'criticidad',
                        Matriz.conflicto AS 'conflicto', Rel_Duty_Perfil.perfil as \"P1\"
                     FROM (Rel_Operador_Perfil
                      INNER JOIN Rel_Duty_Perfil ON Rel_Operador_Perfil.Operador_Perfil = Rel_Duty_Perfil.perfil
                      INNER JOIN Duty ON Rel_Duty_Perfil.idduty = Duty.id
                      INNER JOIN Matriz ON Duty.id = Matriz.duty1 ) )AS primerset
            
                  INNER JOIN
                    (SELECT Matriz.conflicto as 'conflicto2', Rel_Operador_Perfil.operador as 'operador2',Rel_Operador_Perfil.sucursal_operador as 'sucursal2', Duty.nombre AS 'D2', Rel_Duty_Perfil.perfil as \"P2\"
                      FROM(Rel_Operador_Perfil
                      INNER JOIN Rel_Duty_Perfil ON Rel_Operador_Perfil.Operador_Perfil = Rel_Duty_Perfil.perfil
                      INNER JOIN Duty ON Rel_Duty_Perfil.idduty = Duty.id
                      INNER JOIN Matriz ON Duty.id = Matriz.duty2 ) ) AS segundoset
                  ON primerset.operador1 =  segundoset.operador2) 
                  WHERE primerset.conflicto = segundoset.conflicto2
                  GROUP BY primerset.operador1, primerset.D1, segundoset.D2, primerset.conflicto, primerset.criticidad,primerset.P1,segundoset.P2) AS fullset
");
        return $results;
    }

    public function fullAnalisis()
    {
        $results = DB::select("
          SELECT
            primerset.conflicto,
            primerset.operador1,
            primerset.duty1,
            primerset.P1,
            segundoset.duty2,
            segundoset.P2,
            primerset.criticidad,
            primerset.descripcion
          FROM
            ((SELECT Rel_Operador_Perfil.operador  AS 'operador1', Rel_Operador_Perfil.sucursal_operador as 'sucursal1', Duty.nombre AS 'duty1', Matriz.criticidad AS 'criticidad',
                Matriz.conflicto AS 'conflicto', Rel_Duty_Perfil.perfil as 'P1', Matriz.descripcion as 'descripcion'
             FROM (Rel_Operador_Perfil
              INNER JOIN Rel_Duty_Perfil ON Rel_Operador_Perfil.Operador_Perfil = Rel_Duty_Perfil.perfil
              INNER JOIN Duty ON Rel_Duty_Perfil.idduty = Duty.id
              INNER JOIN Matriz ON Duty.id = Matriz.duty1 ))AS primerset
          INNER JOIN
            (SELECT Matriz.conflicto as 'conflicto2', Rel_Operador_Perfil.operador as 'operador2',Rel_Operador_Perfil.sucursal_operador as 'sucursal2', Duty.nombre AS 'duty2', Rel_Duty_Perfil.perfil as 'P2'
              FROM(Rel_Operador_Perfil
              INNER JOIN Rel_Duty_Perfil ON Rel_Operador_Perfil.Operador_Perfil = Rel_Duty_Perfil.perfil
              INNER JOIN Duty ON Rel_Duty_Perfil.idduty = Duty.id
              INNER JOIN Matriz ON Duty.id = Matriz.duty2 )) AS segundoset
          ON primerset.operador1 =  segundoset.operador2) WHERE primerset.conflicto = segundoset.conflicto2
          GROUP BY primerset.operador1, primerset.duty1, segundoset.duty2, primerset.conflicto, primerset.criticidad,primerset.P1,segundoset.P2,primerset.descripcion
          ORDER BY primerset.operador1");
        return $results;
    }

}
