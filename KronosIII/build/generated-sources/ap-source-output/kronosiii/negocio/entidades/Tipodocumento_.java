package kronosiii.negocio.entidades;

import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Empleados;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:01")
@StaticMetamodel(Tipodocumento.class)
public class Tipodocumento_ { 

    public static volatile SingularAttribute<Tipodocumento, Integer> idTipoDoc;
    public static volatile ListAttribute<Tipodocumento, Empleados> empleadosList;
    public static volatile SingularAttribute<Tipodocumento, String> tipoDoc;
    public static volatile SingularAttribute<Tipodocumento, String> abreviacion;
    public static volatile SingularAttribute<Tipodocumento, Boolean> defecto;

}