package kronosiii.negocio.entidades;

import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Edificio;
import kronosiii.negocio.entidades.Funcion;
import kronosiii.negocio.entidades.Lugardetrabajo;
import kronosiii.negocio.entidades.Nacionalidad;
import kronosiii.negocio.entidades.Tipodefranco;
import kronosiii.negocio.entidades.Tipodocumento;
import kronosiii.negocio.entidades.Tipoempleado;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:01")
@StaticMetamodel(Empleados.class)
public class Empleados_ { 

    public static volatile SingularAttribute<Empleados, Integer> numDocumento;
    public static volatile SingularAttribute<Empleados, Edificio> idEdificio;
    public static volatile SingularAttribute<Empleados, Nacionalidad> idNacionalidad;
    public static volatile SingularAttribute<Empleados, Date> fechaNacimiento;
    public static volatile SingularAttribute<Empleados, Integer> toleranciaTarde;
    public static volatile SingularAttribute<Empleados, String> nombre;
    public static volatile SingularAttribute<Empleados, Integer> legajo;
    public static volatile SingularAttribute<Empleados, String> domicilio;
    public static volatile SingularAttribute<Empleados, Tipodocumento> idTipoDoc;
    public static volatile SingularAttribute<Empleados, Integer> idEmpleado;
    public static volatile SingularAttribute<Empleados, String> apellido;
    public static volatile SingularAttribute<Empleados, Tipoempleado> idTipoEmpleado;
    public static volatile SingularAttribute<Empleados, String> telefono;
    public static volatile SingularAttribute<Empleados, String> email;
    public static volatile SingularAttribute<Empleados, Integer> categoria;
    public static volatile SingularAttribute<Empleados, Tipodefranco> idTipoFranco;
    public static volatile SingularAttribute<Empleados, Integer> oficinaPersonal;
    public static volatile SingularAttribute<Empleados, Date> antiguedadAnterior;
    public static volatile SingularAttribute<Empleados, Integer> idFoto;
    public static volatile SingularAttribute<Empleados, Date> fechaIngreso;
    public static volatile SingularAttribute<Empleados, Integer> horasATrabajar;
    public static volatile SingularAttribute<Empleados, Lugardetrabajo> idLugarTrabajo;
    public static volatile SingularAttribute<Empleados, Boolean> personalACargo;
    public static volatile SingularAttribute<Empleados, Funcion> idFuncion;
    public static volatile SingularAttribute<Empleados, Boolean> adicionalPorFuncion;
    public static volatile SingularAttribute<Empleados, String> cuil;
    public static volatile SingularAttribute<Empleados, String> sexo;
    public static volatile SingularAttribute<Empleados, Boolean> esereno;
    public static volatile SingularAttribute<Empleados, Boolean> activo;

}