/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "EMPLEADOS")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Empleados.findAll", query = "SELECT e FROM Empleados e"),
    @NamedQuery(name = "Empleados.findByIdEmpleado", query = "SELECT e FROM Empleados e WHERE e.idEmpleado = :idEmpleado"),
    @NamedQuery(name = "Empleados.findByLegajo", query = "SELECT e FROM Empleados e WHERE e.legajo = :legajo"),
    @NamedQuery(name = "Empleados.findByNombre", query = "SELECT e FROM Empleados e WHERE e.nombre = :nombre"),
    @NamedQuery(name = "Empleados.findByApellido", query = "SELECT e FROM Empleados e WHERE e.apellido = :apellido"),
    @NamedQuery(name = "Empleados.findByNumDocumento", query = "SELECT e FROM Empleados e WHERE e.numDocumento = :numDocumento"),
    @NamedQuery(name = "Empleados.findByCuil", query = "SELECT e FROM Empleados e WHERE e.cuil = :cuil"),
    @NamedQuery(name = "Empleados.findByFechaNacimiento", query = "SELECT e FROM Empleados e WHERE e.fechaNacimiento = :fechaNacimiento"),
    @NamedQuery(name = "Empleados.findByDomicilio", query = "SELECT e FROM Empleados e WHERE e.domicilio = :domicilio"),
    @NamedQuery(name = "Empleados.findBySexo", query = "SELECT e FROM Empleados e WHERE e.sexo = :sexo"),
    @NamedQuery(name = "Empleados.findByCategoria", query = "SELECT e FROM Empleados e WHERE e.categoria = :categoria"),
    @NamedQuery(name = "Empleados.findByTelefono", query = "SELECT e FROM Empleados e WHERE e.telefono = :telefono"),
    @NamedQuery(name = "Empleados.findByPersonalACargo", query = "SELECT e FROM Empleados e WHERE e.personalACargo = :personalACargo"),
    @NamedQuery(name = "Empleados.findByIdFoto", query = "SELECT e FROM Empleados e WHERE e.idFoto = :idFoto"),
    @NamedQuery(name = "Empleados.findByFechaIngreso", query = "SELECT e FROM Empleados e WHERE e.fechaIngreso = :fechaIngreso"),
    @NamedQuery(name = "Empleados.findByActivo", query = "SELECT e FROM Empleados e WHERE e.activo = :activo"),
    @NamedQuery(name = "Empleados.findByAdicionalPorFuncion", query = "SELECT e FROM Empleados e WHERE e.adicionalPorFuncion = :adicionalPorFuncion"),
    @NamedQuery(name = "Empleados.findByAntiguedadAnterior", query = "SELECT e FROM Empleados e WHERE e.antiguedadAnterior = :antiguedadAnterior"),
    @NamedQuery(name = "Empleados.findByEmail", query = "SELECT e FROM Empleados e WHERE e.email = :email"),
    @NamedQuery(name = "Empleados.findByEsereno", query = "SELECT e FROM Empleados e WHERE e.esereno = :esereno"),
    @NamedQuery(name = "Empleados.findByToleranciaTarde", query = "SELECT e FROM Empleados e WHERE e.toleranciaTarde = :toleranciaTarde"),
    @NamedQuery(name = "Empleados.findByHorasATrabajar", query = "SELECT e FROM Empleados e WHERE e.horasATrabajar = :horasATrabajar"),
    @NamedQuery(name = "Empleados.findByOficinaPersonal", query = "SELECT e FROM Empleados e WHERE e.oficinaPersonal = :oficinaPersonal")})
public class Empleados implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdEmpleado")
    private Integer idEmpleado;
    @Basic(optional = false)
    @Column(name = "Legajo")
    private int legajo;
    @Column(name = "Nombre")
    private String nombre;
    @Column(name = "Apellido")
    private String apellido;
    @Column(name = "NumDocumento")
    private Integer numDocumento;
    @Column(name = "Cuil")
    private String cuil;
    @Column(name = "FechaNacimiento")
    @Temporal(TemporalType.TIMESTAMP)
    private Date fechaNacimiento;
    @Column(name = "Domicilio")
    private String domicilio;
    @Column(name = "Sexo")
    private String sexo;
    @Column(name = "Categoria")
    private Integer categoria;
    @Column(name = "Telefono")
    private String telefono;
    @Column(name = "PersonalACargo")
    private Boolean personalACargo;
    @Column(name = "IdFoto")
    private Integer idFoto;
    @Column(name = "FechaIngreso")
    @Temporal(TemporalType.TIMESTAMP)
    private Date fechaIngreso;
    @Column(name = "Activo")
    private Boolean activo;
    @Column(name = "AdicionalPorFuncion")
    private Boolean adicionalPorFuncion;
    @Column(name = "AntiguedadAnterior")
    @Temporal(TemporalType.TIMESTAMP)
    private Date antiguedadAnterior;
    @Column(name = "Email")
    private String email;
    @Column(name = "Esereno")
    private Boolean esereno;
    @Column(name = "ToleranciaTarde")
    private Integer toleranciaTarde;
    @Column(name = "HorasATrabajar")
    private Integer horasATrabajar;
    @Column(name = "OficinaPersonal")
    private Integer oficinaPersonal;
    @JoinColumn(name = "IdEdificio", referencedColumnName = "IdEdificio")
    @ManyToOne
    private Edificio idEdificio;
    @JoinColumn(name = "IdFuncion", referencedColumnName = "IdFuncion")
    @ManyToOne
    private Funcion idFuncion;
    @JoinColumn(name = "IdLugarTrabajo", referencedColumnName = "IdLugarTrabajo")
    @ManyToOne
    private Lugardetrabajo idLugarTrabajo;
    @JoinColumn(name = "IdNacionalidad", referencedColumnName = "IdNacionalidad")
    @ManyToOne
    private Nacionalidad idNacionalidad;
    @JoinColumn(name = "IdTipoFranco", referencedColumnName = "IdTipoFranco")
    @ManyToOne
    private Tipodefranco idTipoFranco;
    @JoinColumn(name = "IdTipoDoc", referencedColumnName = "IdTipoDoc")
    @ManyToOne
    private Tipodocumento idTipoDoc;
    @JoinColumn(name = "IdTipoEmpleado", referencedColumnName = "IdTipoEmpleado")
    @ManyToOne
    private Tipoempleado idTipoEmpleado;

    public Empleados() {
    }

    public Empleados(Integer idEmpleado) {
        this.idEmpleado = idEmpleado;
    }

    public Empleados(Integer idEmpleado, int legajo) {
        this.idEmpleado = idEmpleado;
        this.legajo = legajo;
    }

    public Integer getIdEmpleado() {
        return idEmpleado;
    }

    public void setIdEmpleado(Integer idEmpleado) {
        this.idEmpleado = idEmpleado;
    }

    public int getLegajo() {
        return legajo;
    }

    public void setLegajo(int legajo) {
        this.legajo = legajo;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public Integer getNumDocumento() {
        return numDocumento;
    }

    public void setNumDocumento(Integer numDocumento) {
        this.numDocumento = numDocumento;
    }

    public String getCuil() {
        return cuil;
    }

    public void setCuil(String cuil) {
        this.cuil = cuil;
    }

    public Date getFechaNacimiento() {
        return fechaNacimiento;
    }

    public void setFechaNacimiento(Date fechaNacimiento) {
        this.fechaNacimiento = fechaNacimiento;
    }

    public String getDomicilio() {
        return domicilio;
    }

    public void setDomicilio(String domicilio) {
        this.domicilio = domicilio;
    }

    public String getSexo() {
        return sexo;
    }

    public void setSexo(String sexo) {
        this.sexo = sexo;
    }

    public Integer getCategoria() {
        return categoria;
    }

    public void setCategoria(Integer categoria) {
        this.categoria = categoria;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public Boolean getPersonalACargo() {
        return personalACargo;
    }

    public void setPersonalACargo(Boolean personalACargo) {
        this.personalACargo = personalACargo;
    }

    public Integer getIdFoto() {
        return idFoto;
    }

    public void setIdFoto(Integer idFoto) {
        this.idFoto = idFoto;
    }

    public Date getFechaIngreso() {
        return fechaIngreso;
    }

    public void setFechaIngreso(Date fechaIngreso) {
        this.fechaIngreso = fechaIngreso;
    }

    public Boolean getActivo() {
        return activo;
    }

    public void setActivo(Boolean activo) {
        this.activo = activo;
    }

    public Boolean getAdicionalPorFuncion() {
        return adicionalPorFuncion;
    }

    public void setAdicionalPorFuncion(Boolean adicionalPorFuncion) {
        this.adicionalPorFuncion = adicionalPorFuncion;
    }

    public Date getAntiguedadAnterior() {
        return antiguedadAnterior;
    }

    public void setAntiguedadAnterior(Date antiguedadAnterior) {
        this.antiguedadAnterior = antiguedadAnterior;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Boolean getEsereno() {
        return esereno;
    }

    public void setEsereno(Boolean esereno) {
        this.esereno = esereno;
    }

    public Integer getToleranciaTarde() {
        return toleranciaTarde;
    }

    public void setToleranciaTarde(Integer toleranciaTarde) {
        this.toleranciaTarde = toleranciaTarde;
    }

    public Integer getHorasATrabajar() {
        return horasATrabajar;
    }

    public void setHorasATrabajar(Integer horasATrabajar) {
        this.horasATrabajar = horasATrabajar;
    }

    public Integer getOficinaPersonal() {
        return oficinaPersonal;
    }

    public void setOficinaPersonal(Integer oficinaPersonal) {
        this.oficinaPersonal = oficinaPersonal;
    }

    public Edificio getIdEdificio() {
        return idEdificio;
    }

    public void setIdEdificio(Edificio idEdificio) {
        this.idEdificio = idEdificio;
    }

    public Funcion getIdFuncion() {
        return idFuncion;
    }

    public void setIdFuncion(Funcion idFuncion) {
        this.idFuncion = idFuncion;
    }

    public Lugardetrabajo getIdLugarTrabajo() {
        return idLugarTrabajo;
    }

    public void setIdLugarTrabajo(Lugardetrabajo idLugarTrabajo) {
        this.idLugarTrabajo = idLugarTrabajo;
    }

    public Nacionalidad getIdNacionalidad() {
        return idNacionalidad;
    }

    public void setIdNacionalidad(Nacionalidad idNacionalidad) {
        this.idNacionalidad = idNacionalidad;
    }

    public Tipodefranco getIdTipoFranco() {
        return idTipoFranco;
    }

    public void setIdTipoFranco(Tipodefranco idTipoFranco) {
        this.idTipoFranco = idTipoFranco;
    }

    public Tipodocumento getIdTipoDoc() {
        return idTipoDoc;
    }

    public void setIdTipoDoc(Tipodocumento idTipoDoc) {
        this.idTipoDoc = idTipoDoc;
    }

    public Tipoempleado getIdTipoEmpleado() {
        return idTipoEmpleado;
    }

    public void setIdTipoEmpleado(Tipoempleado idTipoEmpleado) {
        this.idTipoEmpleado = idTipoEmpleado;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idEmpleado != null ? idEmpleado.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Empleados)) {
            return false;
        }
        Empleados other = (Empleados) object;
        if ((this.idEmpleado == null && other.idEmpleado != null) || (this.idEmpleado != null && !this.idEmpleado.equals(other.idEmpleado))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Empleados[ idEmpleado=" + idEmpleado + " ]";
    }
    
}
