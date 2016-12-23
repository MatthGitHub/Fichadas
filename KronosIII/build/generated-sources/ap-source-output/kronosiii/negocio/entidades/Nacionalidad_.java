package kronosiii.negocio.entidades;

import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Empleados;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:01")
@StaticMetamodel(Nacionalidad.class)
public class Nacionalidad_ { 

    public static volatile SingularAttribute<Nacionalidad, String> descripcion;
    public static volatile SingularAttribute<Nacionalidad, Integer> idNacionalidad;
    public static volatile ListAttribute<Nacionalidad, Empleados> empleadosList;

}